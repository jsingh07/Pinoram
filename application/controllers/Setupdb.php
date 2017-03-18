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
		if($this->session->userdata('role') != 'admin')
		{
			$this->load->view('access_denied.php');
		}
		else{
			$this->load->view('setupdb/setup');
		}
	}

/*-----------------------------------------------------------------
-----------------------------Tables--------------------------------
-------------------------------------------------------------------*/

	private function installAll()
	{
		$text['mytext'] = "Installed All Tables";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->InstallUser();
		$this->Setupdb_model->InstallToken();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function installUser()
	{
		$text['mytext'] = "Installed User Table";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->InstallUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function installToken()
	{
		$text['mytext'] = "Installed Token Table";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->InstallToken();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function dropAll()
	{
		$text['mytext'] = "Dropped All Tables";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropUser();
		$this->Setupdb_model->dropToken();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function dropUser()
	{
		$text['mytext'] = "Dropped User Table";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function dropToken()
	{
		$text['mytext'] = "Dropped Token Table";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropToken();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function showUser()
	{
		$this->load->view('templates/header.php');
		$data['query'] = $this->Setupdb_model->showUser();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/show/user', $data);
	}

	private function showToken()
	{
		$this->load->view('templates/header.php');
		$data['query'] = $this->Setupdb_model->showToken();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/show/token', $data);
	}

/*-----------------------------------------------------------------
-----------------------contents------------------------------------
-------------------------------------------------------------------*/

	private function addContent_User()
	{
		$text['mytext'] = "Added User Content";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->addContent_User();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function addContent_Token()
	{
		$text['mytext'] = "Added Token Content";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->addContent_Token();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function dropContent_User()
	{
		$text['mytext'] = "Dropped User Content";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropContent_User();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function dropContent_Token()
	{
		$text['mytext'] = "Dropped Token Content";
		$this->load->view('templates/header.php');
		$this->Setupdb_model->dropContent_Token();
		$this->load->view('setupdb/setup');
		$this->load->view('setupdb/success', $text);
	}

	private function editUser()
	{
		$id= $this->uri->segment(3);
		$this->load->view('templates/header.php');
		$this->load->view('setupdb/setup');
		$query = $this->Setupdb_model->getUser($id);
		$query_name = $query->row();
		$name = $query_name->username;
		$result = $this->Setupdb_model->editUser($id);
		if($result == 1)
		{
			$text['mytext'] = "Deleted User ID ".$id. " with username: ".$name;
		}
		else
		{
			$text['mytext'] = "Could not edit User Table";
		}
		$this->load->view('setupdb/success', $text);
	}


	private function editToken()
	{
		$id= $this->uri->segment(3);
		$this->load->view('templates/header.php');
		$this->load->view('setupdb/setup');
		$result = $this->Setupdb_model->editToken($id);
		if($result == 1)
		{
			$text['mytext'] = "Deleted Token ID ".$id;
		}
		else
		{
			$text['mytext'] = "Could not edit Token Table";
		}
		$this->load->view('setupdb/success', $text);
	}




}


?>