<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
if(!isset($_SESSION)){
    session_start();
}*/

class User_Authentication extends CI_Controller {

	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	// Load form helper library
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	// Load session library
	//$this->load->library('session');

	// Load database
	$this->load->model('User_Authentication_model');
	}

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('user_authentication/login_form');
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
		/*$my_text['val'] = $this->input->post('first_name');
		$my_text['myval'] = $this->input->post('last_name');
		echo $my_text['val'];
		echo $my_text['myval'];*/
		$data['msg'] = "";
		$this->form_validation->set_message('is_unique', 'The %s is already taken');
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

	public function base64url_encode($data) { 
	    return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	public function base64url_decode($data) { 
	    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	} 



}

?>