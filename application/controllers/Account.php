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

	        $filepath = '/Library/WebServer/Documents/pinoram/pinoram-production/files/profile_images/'.$picture_id.'.jpg';
	        file_put_contents($filepath, $data);
	        redirect('Account');	   
	    }
	}

	public function edit_account()
	{
		if($this->access())
		{
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

	private function send_email($message, $subject, $email)
	{
        $this->email->from('admin@pinoram.com' , 'Pinoram');
		$this->email->to($email); 

        $this->email->subject($subject);
        $this->email->message($message);  

        $this->email->send();
	}



}
?>
