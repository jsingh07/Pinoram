<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setupdb extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('templates/header.php');
		$this->load->view('setupdb/setup');
	}

	public function installAll()
	{
		$this->load->helper('url');
		$this->load->view('templates/header.php');
		$this->load->model('Setupdb_model');
		$this->Setupdb_model->InstallUser();
		$this->load->view('setupdb/setup');
	}

	public function installUser()
	{
		$this->load->helper('url');
		$this->load->view('templates/header.php');
		$this->load->model('Setupdb_model');
		$this->Setupdb_model->InstallUser();
		$this->load->view('setupdb/setup');
	}

	public function dropAll()
	{
		$this->load->helper('url');
		$this->load->view('templates/header.php');
		$this->load->model('Setupdb_model');
		$this->Setupdb_model->dropUser();
		$this->load->view('setupdb/setup');
	}

	public function dropUser()
	{
		$this->load->helper('url');
		$this->load->view('templates/header.php');
		$this->load->model('Setupdb_model');
		$this->Setupdb_model->dropUser();
		$this->load->view('setupdb/setup');
	}
}
?>