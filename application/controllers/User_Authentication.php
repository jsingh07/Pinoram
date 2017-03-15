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
		$this->load->view('templates/header.php');
		$this->load->view('user_authentication/registration_form');

	}

	public function new_user_registration()
	{

	}



}

?>