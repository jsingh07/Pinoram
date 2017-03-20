<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller {

	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	// Load form helper library
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	// Load model
	$this->load->model('User_Authentication_model');
	}

	public function index()
	{
		$data['msg'] = "";
		$this->load->view('templates/header.php');
		$this->load->view('user_authentication/login_form', $data);
	}

	public function user_login()
	{
		$this->form_validation->set_rules('username', 'Username or Email', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
		if ($this->form_validation->run() == FALSE) 
		{
			$data['msg'] = "";
			$this->load->view('templates/header.php');
			$this->load->view('user_authentication/login_form', $data);
		}
		else
		{
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
	        $id = $this->User_Authentication_model->confirmUser($clean);
	        if($id)
	        {
		        foreach ($id->result() as $data)
		        {
		        	$first_name = $data->first_name;
		        	$last_name = $data->last_name;
		        	$newdata = array(
	                   'username'  => $data->username,
	                   'email'     => $data->email,
	                   'first_name'=> $data->first_name,
	                   'last_name' => $data->last_name,
	                   'role'      => $data->role,
	                   'status'    => $data->status,
	                   'logged_in' => TRUE
	                );
		        }
		        $text['mytext'] = "Welcome ".$first_name;
		        $this->session->set_userdata($newdata);
		        $this->load->view('templates/header.php');
		        $this->load->view('home.php');
		        $this->load->view('setupdb/success.php', $text);
		    }
		    else
		   	{
		   		$data['msg'] = "Username/Email and password Incorrect. Please try again.";
		   		$this->load->view('templates/header.php');
				$this->load->view('user_authentication/login_form', $data);
		   	}
		}
	}

	public function user_logout()
	{
		$data['msg'] = "";
		$this->session->set_userdata('logged_in',FALSE);
		$this->load->view('templates/header.php');
		$this->load->view('user_authentication/login_form', $data);
		session_destroy();
	}

	public function user_registration()
	{
		$data['msg'] = "";
		$this->load->view('templates/header.php');
		$this->load->view('user_authentication/registration_form', $data);
		//$this->load->view('user_authentication/test');
	}

	public function new_user_registration()
	{
		$p1 = $this->input->post('password');
		$p2 = $this->input->post('passwordconf');
		if($p1 != $p2)
		{
			$data['msg'] = "The password and password confirmation need to match";
			$this->load->view('templates/header.php');
			$this->load->view('user_authentication/registration_form', $data);
		}
		else
		{
			$data['msg'] = "";
			$this->form_validation->set_message('is_unique', 'The %s is already taken.');
			// Check validation for user input in SignUp form
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[user.username]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
			if ($this->form_validation->run() == FALSE) 
			{
				$this->load->view('templates/header.php');
				$this->load->view('user_authentication/registration_form', $data);
			}
			else
			{

				$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
	            $id = $this->User_Authentication_model->insertUser($clean);

				if ($id) 
				{
					$token = $this->User_Authentication_model->insertToken($id);                                        
	            
		            $qstring = $this->base64url_encode($token);                      
		            $url = site_url() . 'User_Authentication/complete/' . $qstring;
		            $link = '<a href="' . $url . '">' . $url . '</a>'; 
		                       
		            $message = '';                     
		            $message .= '<strong>You have signed up with our website</strong><br>';
		            $message .= '<strong>Please click to confirm your email:</strong><br>' . $link; 

		            $data['msg'] = "Thank you for registering on Pinoram. Please confirm your email address.";                         

					$this->load->view('templates/header.php');
					$this->load->view('user_authentication/email_prompt', $data);
				} 
				else 
				{
					$data['msg'] = 'There is a problem registering your account...';
					$this->load->view('templates/header.php');
					$this->load->view('user_authentication/registration_form', $data);
				}
			}
		}
	}

	public function base64url_encode($data) { 
	    return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	public function base64url_decode($data) { 
	    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 



}

?>