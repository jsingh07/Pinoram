<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Account extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	$this->load->model('Account_model');
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	}

	public function index()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$this->load->view('account/edit_account.php');
		}
		else
		{
			redirect('Welcome');
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
			return 0;
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
		else
		{
			redirect('Welcome');
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
		else
		{
			redirect('Welcome');
		}
	}

}