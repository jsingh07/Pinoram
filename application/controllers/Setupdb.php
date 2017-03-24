<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Setupdb extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	$this->load->model('Setupdb_model');
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	}

	public function index()
	{
		$this->load->view('templates/header.php');
		if($this->session->userdata('role') == 'admin')
		{
			$this->load->view('setupdb/setup');
		}
		elseif($this->session->userdata('role') == 'super-user')
		{
			$this->load->view('setupdb/setup');
		}
		else
		{
			$this->load->view('access_denied.php');

		}
	}

	public function access()
	{
		if($this->session->userdata('role') == 'admin')
		{
			return 1;
		}
		elseif($this->session->userdata('role') == 'super-user')
		{
			return 1;
		}
		else
		{
			$this->load->view('templates/header.php');
			$this->load->view('access_denied.php');
			return 0;
		}
	}

	public function access_super()
	{
		if($this->session->userdata('role') == 'super-user')
		{
			return 1;
		}
		else
		{
			$this->load->view('templates/header.php');
			$this->load->view('access_denied.php');
			return 0;
		}
	}

/*-----------------------------------------------------------------
-----------------------------Tables--------------------------------
-------------------------------------------------------------------*/

	public function installAll()
	{
		if($this->access())
		{
			$text['mytext'] = "Installed All Tables";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->InstallUser();
			$this->Setupdb_model->InstallToken();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function installUser()
	{
		if($this->access())
		{
			$text['mytext'] = "Installed User Table";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->InstallUser();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function installToken()
	{
		if($this->access())
		{
			$text['mytext'] = "Installed Token Table";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->InstallToken();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function installUser_info()
	{
		if($this->access())
		{
			$text['mytext'] = "Installed User Info Table";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->InstallUser_info();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function dropAll()
	{
		if($this->access())
		{
			$text['mytext'] = "Dropped All Tables";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->dropUser();
			$this->Setupdb_model->dropToken();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function dropUser()
	{
		if($this->access())
		{
			$text['mytext'] = "Dropped User Table";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->dropUser();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function dropToken()
	{
		if($this->access())
		{
			$text['mytext'] = "Dropped Token Table";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->dropToken();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function dropUser_info()
	{
		if($this->access())
		{
			$text['mytext'] = "Dropped User Info Table";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->dropUser_info();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function showUser()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$data['query'] = $this->Setupdb_model->showUser();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/show/user', $data);
		}
	}

	public function showToken()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$data['query'] = $this->Setupdb_model->showToken();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/show/token', $data);
		}
	}

	public function showAdmin()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$data['query'] = $this->Setupdb_model->showUser();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/make_admin', $data);
		}
	}

/*-----------------------------------------------------------------
-----------------------contents------------------------------------
-------------------------------------------------------------------*/

	public function addContent_User()
	{
		if($this->access())
		{
			$text['mytext'] = "Added User Content";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->addContent_User();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function _addContent_Token()
	{
		if($this->access())
		{
			$text['mytext'] = "Added Token Content";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->addContent_Token();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function dropContent_User()
	{
		if($this->access())
		{
			$text['mytext'] = "Dropped User Content";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->dropContent_User();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function dropContent_Token()
	{
		if($this->access())
		{
			$text['mytext'] = "Dropped Token Content";
			$this->load->view('templates/header.php');
			$this->Setupdb_model->dropContent_Token();
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}
	}

	public function make_admin()
	{
		if($this->access_super())
		{
			$id= $this->uri->segment(3);
			$this->load->view('templates/header.php');
			$this->load->view('setupdb/setup');
			$query = $this->Setupdb_model->getUser($id);
			$query_name = $query->row();
			$name = $query_name->username;
			$result = $this->Setupdb_model->makeAdmin($id);
			if($result == 1)
			{
				$text['mytext'] = "Made admin for user ".$id. " with username: ".$name;
			}
			else
			{
				$text['mytext'] = "Could not make admin";
			}
			$this->load->view('setupdb/success', $text);
		}
	}

	public function editUser()
	{
		if($this->access())
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
	}


	public function editToken()
	{
		if($this->access())
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

	public function Email()
	{
		$text['mytext']="Email Sent";
		$Email = $this->input->post('email');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header.php');
			$this->load->view('setupdb/setup');
		}
		else {
			$this->load->view('templates/header.php');
			$this->load->view('setupdb/setup');
			$this->load->view('setupdb/success', $text);
		}


	}



}


?>