<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Account extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	$this->load->model('Account_model');
	$this->load->model('Login_model');
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	$this->email->set_newline("\r\n");

	}

	public function index()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$this->load->view('account/edit_account.php');
		}
		
	}

	public function getBio()
	{
		if($this->access())
		{
			$bio = $this->Account_model->getUserbio($this->session->userdata('user_id'));
			echo json_encode($bio->result(), true);
		}

	}

	public function access()
	{
		if($this->session->userdata('logged_in') == TRUE)
		{
			return 1;
		}
		else
		{
			redirect('Welcome');
		}
	}

	public function profile()
	{
		if($this->access())
		{
			$id = $this->Account_model->get_profile($this->session->userdata('user_id'));
			foreach ($id->result() as $data)
	        {
	        	$newdata = array(
                   'phone'  => $data->phone,
                   'location' => $data->location,
                   'bio'=> $data->bio,
                   'linkedin' => $data->linkedin,
                   'facebook' => $data->facebook,
                   'twitter' => $data->twitter,
                   'instagram' => $data->instagram,
                   'youtube' => $data->youtube,
                   'website' => $data->website
                );
	        }
			$this->load->view('templates/header.php');
			$this->load->view('account/edit_profile.php', $newdata);
		}
		else
		{
			redirect('Welcome');
		}
	}

	public function upload_profile_picture()
	{
		if($this->access())
		{
			$picture_id = $this->session->userdata('user_id');
			$data = $_POST['imagebase64'];
			
        	list($type, $data) = explode(';', $data);
        	list(, $data)      = explode(',', $data);
        	$data = base64_decode($data);


	        $filepath = $this->config->item('rootDir').'/files/profile_images/'.$picture_id.'.jpg';

	        file_put_contents($filepath, $data);
	        redirect('Account');	   
	    }
	}

	public function edit_account()
	{
		if($this->access())
		{
			$email_change = 0;
			$username_change = 0;
			$this->form_validation->set_message('is_unique', 'The %s is already taken.');
			// Check validation for user input in SignUp form
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			
			if($this->session->userdata('username') != $this->input->post('username'))
			{
				$username_change = 1;
				$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[user.username]');
			}

			if($this->session->userdata('email') != $this->input->post('email'))
			{
				$email_change = 1;
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
			}

			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('validation_error', validation_errors());
				redirect('Account');
				//$this->load->view('templates/header.php');
				//$this->load->view('account/edit_account.php');
			}
			else
			{
				if($username_change == 1)
				{
					$username = $this->input->post('username');
					$email = $this->session->userdata('email');
					$subject = "Pinoram user name change";
					$message = '';
					$message .= "<strong>Hi ".$this->session->userdata('first_name').",</strong><br><br>";
					$message .= "<strong>You have changed your user name to: ".$username.".</strong><br>";
					$this->send_email($message, $subject, $email);
				}
				if($email_change == 1)
				{
					$user_id_padded = $this->session->userdata('user_id');
					$num_pads = 5 - strlen($user_id_padded);
					for($i = 0; $i < $num_pads; $i++)
					{
						$user_id_padded .= '*';
					}
					$token = $this->get_token($this->session->userdata('user_id'));
					if ($token)
					{
						$email = $this->session->userdata('email');
						$new_email = $this->input->post('email');

						$token .= "email*****";
						$token .= $user_id_padded;
						$token .= $new_email;
						$qstring = $this->base64url_encode($token);                      
				        $url = site_url() . 'Account/email_change/' . $qstring;
				        $link = '<a href="' . $url . '">' . $url . '</a>'; 
						
						$subject = "Pinoram account email change";
						$message = '';
						$message .= "<strong>Hi ".$this->session->userdata('first_name').",</strong><br><br>";
						$message .= "<strong>You have requested to change your Pinoram email from ".$email." to ".$new_email.".</strong><br>";
						$message .= "Please click on the link below to change confirm email change.<br>";
						$message .= $link."<br>";

						$this->session->set_flashdata('email_change_validation', "Please check the new email to confirm email change.");
						$this->send_email($message, $subject, $new_email);
					}
				}

				$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
		        $this->Account_model->edit_account($clean, $this->session->userdata('user_id'));
		        $id = $this->Account_model->get_account($this->session->userdata('user_id'));

		        foreach ($id->result() as $data)
		        {
		        	$newdata = array(
	                   'username'  => $data->username,
	                   'email'     => $data->email,
	                   'first_name'=> $data->first_name,
	                   'last_name' => $data->last_name,
	                );
		        }
			    $this->session->set_userdata($newdata);

				redirect('Account');
			}
		}
	}

	public function edit_profile()
	{
		if($this->access())
		{
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
	        $this->Account_model->edit_profile($clean, $this->session->userdata('user_id'));

			redirect('Account/profile');
		}
	}

	public function delete_account()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$data['msg'] = "";
			$data['link'] = "Account/delete_account_conf";
			$this->load->view('login/delete_password_conf.php', $data);
		}
	}

	public function delete_account_conf()
	{
		$u_id = $this->session->userdata('user_id');
		$password = $this->input->post('password');
		$conf = $this->Login_model->confirm_password($u_id, $password);
		if($conf)
		{
			$status = $this->Account_model->delete_account($u_id);
			if($status > 0)
			{
				$email = $this->session->userdata('email');
				$subject = "Pinoram Account Deleted";
				$message = '';
				$message .= "<strong>Hi ".$this->session->userdata('first_name').",</strong><br><br>";
				$message .= "<strong>This message is sent to confirm that your account on Pinoram has been deleted.</strong><br>";
				$this->send_email($message, $subject, $email);
				$this->session->set_userdata('logged_in',FALSE);
				session_destroy();
				$text['mytext'] = "Please confirm your request for Account deletion from your email.";
				$this->load->view('setupdb/success.php', $text);
				redirect('Welcome');
			}
		}
		else
		{
			$this->load->view('templates/header.php');
			$data['msg'] = "Incorrect password";
			$data['link'] = "Account/delete_account_conf";
			$this->load->view('login/delete_password_conf.php', $data);
		}
	}

	public function email_change()
	{
		$token = base64_decode($this->uri->segment(3));
		$tmp_user_id = substr($token,40, 5);
		$exploded_user_id = explode("*", $tmp_user_id);
		$user_id = $exploded_user_id[0];
		$new_email = substr($token, 45);
		$status = substr($token,30,10); 
		$parsed_token = substr($token,0,(40+strlen($user_id)));
		if($status == "email*****")
		{
			$cleanToken = $this->security->xss_clean($parsed_token);
	        $user_info = $this->Login_model->isTokenValid($cleanToken);
	        if($user_info)
	        {
	        	$msg = "You have changed your email to ". $new_email;
	        	$this->Login_model->updateToken($user_info);
				$this->Account_model->edit_email($new_email, $user_id);
		        $this->session->set_userdata('email', $new_email);
		        $this->session->set_flashdata('hometoastmsg', $msg);
		        redirect('');
		    }
		    else
		    {
				$this->load->view('templates/header.php');
				$this->load->view('access_denied.php');
		    }
		}
		else
		{
			$this->load->view('templates/header.php');
			$this->load->view('access_denied.php');
		}
	}

	private function send_email($message, $subject, $email)
	{
        $this->email->from('admin@pinoram.com' , 'Pinoram');
		$this->email->to($email); 

        $this->email->subject($subject);
        $this->email->message($message);  

        $this->email->send();
	}

	private function get_token($user_id)
	{
		$gettoken = $this->Login_model->getToken($user_id);
		if ($gettoken)
		{
			$tokenrow = $gettoken->row();
			$token = $tokenrow->token;
			return $token;
		}
		else
		{
			return 0;
		}
	}

	private function base64url_encode($data) { 
	    return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	private function base64url_decode($data) { 
	    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 



}
?>
