<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Project extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');

	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');

	$this->load->model('Project_model');

	}

	public function index()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$this->load->view('project/map.php');
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

	public function create_project()
	{
		if($this->access())
		{
			if($this->input->post('project_access'))
			{
				$access = "public";
			}
			else
			{
				$access = "private";
			}
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));

			$project_id = $this->Project_model->create_project($clean, $this->session->userdata('user_id'), $access);
		}

		/*	$data['project_id'] = 1;
			$this->load->view('templates/header.php');
			$this->load->view('project/project_picture.php', $data);*/

	}

	public function picture()
	{
		if($this->access())
		{
			$data['files']  = $this->Project_model->get_pictures($this->session->userdata('user_id'));
			$this->load->view('templates/header.php');
			$this->load->view('project/upload_picture.php', $data);
		}
	}

	public function upload_picture()
	{
		if($this->access())
		{
			$picture_id = $this->Project_model->insert_picture($this->session->userdata('user_id'));

			$config['upload_path']          = '/var/www/html/pinoram-production/files/images/';
	        $config['allowed_types']        = 'jpg|png';
	        $config['max_size']             = 0;
	        $config['max_width']            = 0;
	        $config['max_height']           = 0;
	        $config['file_name']            = $picture_id.'.jpg';

	        $this->load->library('upload', $config);
	        $this->load->view('templates/header.php');

	        if ( ! $this->upload->do_upload('picture_upload'))
	        {
	                $error = array('error' => $this->upload->display_errors());

	                echo ($error['error']);
	        }
	        else
	        {
	                redirect('Project/picture');
	        }
	    }
	}

	public function edit_picture_info()
	{
		if($this->access())
		{
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
			$this->Project_model->update_picture($clean);

			redirect('Project/picture');
		}
	}

	public function deletePicture()
	{
		if($this->access())
		{
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
			$this->Project_model->delete_picture($clean);

			redirect('Project/picture');
		}
	}

	public function project()
	{
		/*if($this->access())
		{

			// Start XML file, create parent node
			$doc = new DOMDocument("1.0");
			$node = $doc->createElement("markers");
			$parnode = $doc->appendChild($node);

			$result = $this->Project_model->get_pictures($this->session->userdata('user_id'));


			header("Content-type: text/xml");

			// Iterate through the rows, adding XML nodes for each
			foreach ($result->result() as $files){
			  // ADD TO XML DOCUMENT NODE
			  $node = $doc->createElement("marker");
			  $newnode = $parnode->appendChild($node);

			  $newnode->setAttribute("picture_id", $files->picture_id);
			  $newnode->setAttribute("lat", $files->lat);
			  $newnode->setAttribute("lng", $files->lng);
			  $newnode->setAttribute("description", $files->description);
			}

			$data = $doc->saveXML();
			echo $data;
		}*/

		if($this->access())
		{
			$data['files']  = $this->Project_model->get_pictures($this->session->userdata('user_id'));
			$this->load->view('templates/header.php');
			$this->load->view('project/project.php', $data);
		}

	}

	public function test()
	{
		//$data = $this->Project_model->get_pictures($this->session->userdata('user_id'));
		//echo json_encode($data->result());
		$this->load->view('templates/header.php');
		//$this->load->view('gallery.php');
		//$this->load->view('project/test.php');
		//$data['files']  = $this->test_post();

        $this->load->view('project/project_picture.php');
	}

	public function test_post()
	{
		$data = $this->Project_model->get_pictures($this->session->userdata('user_id'));
		echo json_encode($data->result(), true);
	}
}
