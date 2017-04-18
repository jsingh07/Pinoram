<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Project extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');

	$this->load->helper('form');

	$this->load->helper("file");

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

	}

	public function picture()
	{
		if($this->access())
		{
			//$data['files']  = $this->Project_model->get_pictures($this->session->userdata('user_id'));
			$this->load->view('templates/header.php');
			$this->load->view('project/project_picture.php');
		}
	}

	public function upload_picture()
	{
		if($this->access())
		{
			$pic_id = $this->uniqid_base36(true);

	        $this->load->view('templates/header.php');

	        $target_file = '/Library/WebServer/Documents/pinoram/pinoram-production/files/images/'.$pic_id.'.jpg';
	        $filePath = $_FILES['picture_upload']['tmp_name'];
	        $address = $_POST['hiddenaddress'];
	        $lat = $_POST['hiddenlat'];
	        $lng = $_POST['hiddenlng'];

	        $exif = exif_read_data($_FILES['picture_upload']['tmp_name']);
	        // provided that the image is jpeg. Use relevant function otherwise
	        $imageResource = imagecreatefromjpeg($_FILES['picture_upload']['tmp_name']);
			if (!empty($exif['Orientation'])) 
			{
			    switch ($exif['Orientation']) 
			    {
			        case 3:
			        $image = imagerotate($imageResource, 180, 0);
			        break;
			        case 6:
			        $image = imagerotate($imageResource, -90, 0);
			        break;
			        case 8:
			        $image = imagerotate($imageResource, 90, 0);
			        break;
			        default:
			        $image = $imageResource;
			    } 
			}
			else
			{
				$image = $imageResource;
			}
			
			if(imagejpeg($image, $target_file, 100))
			{
				$this->Project_model->insert_picture($this->session->userdata('user_id'), $pic_id);
				if (!empty($lat) && !empty($lng))
				{
					$data['picture_id'] = $pic_id;
					$data['Address'] = $address;
					$data['Latitude'] = $lat;
					$data['Longitude'] = $lng;
					$data['picture_description'] = "";
					$this->Project_model->update_picture($data);
				}
				redirect('Project/picture');
			}
			else
			{
				echo 'error';
			}

	    }
	}

	private function uniqid_base36($more_entropy=false) 
	{
	    $s = uniqid('', $more_entropy);
	    if (!$more_entropy)
	        return base_convert($s, 16, 36);
	        
	    $hex = substr($s, 0, 13);
	    $dec = $s[13] . substr($s, 15); // skip the dot
	    return base_convert($hex, 16, 36) . base_convert($dec, 10, 36);
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
			//delete_files('/Library/WebServer/Documents/pinoram/pinoram-production/files/images/'.$clean['delete_pic'].'.jpg');
			unlink('/Library/WebServer/Documents/pinoram/pinoram-production/files/images/'.$clean['delete_pic'].'.jpg');
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

        $this->load->view('project/test.php');
	}

	public function testexif()
	{
		$this->load->view('templates/header.php');
        $this->load->view('project/exiftest.php');
	}

	public function test_post()
	{
		$data = $this->Project_model->get_pictures($this->session->userdata('user_id'));
		echo json_encode($data->result(), true);
	}
}
?>