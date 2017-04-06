<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Account extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	$this->load->model('Account_model');
	$this->load->model('User_Authentication_model');
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	$config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'admin@pinoram.com',
    'smtp_pass' => 'H3ll0w0rld!',
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
	);
	$this->load->library('email', $config);
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
			$this->load->view('user_authentication/password_conf.php', $data);
		}
	}

	public function delete_account_conf()
	{
		$u_id = $this->session->userdata('user_id');
		$password = $this->input->post('password');
		$conf = $this->User_Authentication_model->confirm_password($u_id, $password);
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
				redirect('Welcome');
			}
		}
		else
		{
			$this->load->view('templates/header.php');
			$data['msg'] = "Incorrect password";
			$data['link'] = "Account/delete_account_conf";
			$this->load->view('user_authentication/password_conf.php', $data);
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