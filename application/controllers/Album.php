<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Album extends CI_Controller {
	public function __construct() {
	parent::__construct();

	$this->load->helper('url');

	$this->load->helper('form');

	$this->load->helper("file");

	// Load form validation library
	$this->load->library('form_validation');

	$this->load->model('Album_model');

	}

	public function index()
	{
		if($this->access())
		{
			$this->load->view('templates/header.php');
			$this->load->view('home/home.php');
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

	public function create_Album()
	{
		if($this->access())
		{
			if($this->input->post('Album_access'))
			{
				$access = "public";
			}
			else
			{
				$access = "private";
			}
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));

			$Album_id = $this->Album_model->create_Album($clean, $this->session->userdata('user_id'), $access);
			$this->load->view('templates/header.php');
			$this->load->view('Album/test.php');
		}

	}

	public function picture()
	{
		if($this->access())
		{			
			$data['album_id'] = $_POST['album_id'];
			$this->load->view('templates/header.php');
			$this->load->view('Album/Album_picture.php', $data);
		}
	}

	public function upload_picture()
	{
		if($this->access())
		{
			$pic_id = $this->uniqid_base36(true);

	        $this->load->view('templates/header.php');

	        $target_file = '/Workspace/Pinoram/pinoram-dev-jag/files/images/'.$pic_id.'.jpg';
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
				$this->Album_model->insert_picture($this->session->userdata('user_id'), $pic_id);
				if (!empty($lat) && !empty($lng))
				{
					$data['picture_id'] = $pic_id;
					$data['Address'] = $address;
					$data['Latitude'] = $lat;
					$data['Longitude'] = $lng;
					$data['picture_description'] = "";
					$this->Album_model->update_picture($data);
				}
				redirect('Album/picture');
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
			$this->Album_model->update_picture($clean);

			redirect('Album/picture');
		}
	}

	public function deletePicture()
	{
		if($this->access())
		{
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
			$this->Album_model->delete_picture($clean);
			//delete_files('/Library/WebServer/Documents/pinoram/pinoram-production/files/images/'.$clean['delete_pic'].'.jpg');
			unlink('/Workspace/Pinoram/pinoram-dev-jag/files/images/'.$clean['delete_pic'].'.jpg');
			redirect('Album/picture');
		}
	}

	public function map()
	{
		if($this->access())
		{
			$data['files']  = $this->Album_model->get_pictures($this->session->userdata('user_id'));
			$this->load->view('templates/header.php');
			$this->load->view('Album/Album.php', $data);
		}
	}

	public function get_Album()
	{
		if($this->access())
		{
			$data  = $this->Album_model->get_Album($this->session->userdata('user_id'));
			$data2 = $this->Album_model->get_pictures($this->session->userdata('user_id'));
			$test = $data->result();
			array_push($test, $data2->result());
			//print_r($test);   
			echo json_encode($test, true);
		}

	}

	public function test()
	{
		//$data = $this->Album_model->get_pictures($this->session->userdata('user_id'));
		//echo json_encode($data->result());
		$this->load->view('templates/header.php');
		//$this->load->view('gallery.php');
		//$this->load->view('Album/test.php');
		//$data['files']  = $this->test_post();

        $this->load->view('Album/test.php');
	}

	public function testexif()
	{
		$this->load->view('templates/header.php');
        $this->load->view('Album/exiftest.php');
	}

	public function test_post()
	{
		$data = $this->Album_model->get_pictures($this->session->userdata('user_id'));
		echo json_encode($data->result(), true);
	}
}
?>