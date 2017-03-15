<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setupdb extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	$this->load->model('Setupdb_model');
	}

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('setupdb/setup');
	}

	public function installAll()
	{
		$text['mytext'] = "Installed All Tables";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->InstallUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	public function installUser()
	{
		$text['mytext'] = "Installed User Table";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->InstallUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	public function dropAll()
	{
		$text['mytext'] = "Dropped All Tables";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	public function dropUser()
	{
		$text['mytext'] = "Dropped User Table";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	public function addContent_User()
	{
		$text['mytext'] = "Added User Content";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->addContent_User();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	public function dropContent_User()
	{
		$text['mytext'] = "Dropped User Content";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropContent_User();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}




}


?>