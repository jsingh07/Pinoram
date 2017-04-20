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
			$album_id = $this->uniqid_base36(true);
			if($this->input->post('Album_access'))
			{
				$access = "public";
			}
			else
			{
				$access = "private";
			}
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));

			$this->Album_model->create_Album($clean, $this->session->userdata('user_id'), $access, $album_id);
			redirect('Album/test');
		}

	}

	public function picture()
	{
		if($this->access())
		{	
			if(isset($_GET['album_id']))
			{
				$album_id = $_GET['album_id'];
				$this->session->set_userdata('album_id', $album_id);
				$this->load->view('templates/header.php');
				$this->load->view('Album/Album_picture.php');
			}
			//echo $this->session->userdata['album_id'];
			else
			{
				echo error;
			}
			
		}
	}

	public function upload_picture()
	{
		if($this->access())
		{
			$album_id = $this->session->userdata('album_id');

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

				$this->Album_model->insert_picture($this->session->userdata('user_id'), $pic_id, $album_id);
				if (!empty($lat) && !empty($lng))
				{
					$data['picture_id'] = $pic_id;
					$data['Address'] = $address;
					$data['Latitude'] = $lat;
					$data['Longitude'] = $lng;
					$data['picture_description'] = "";
					$this->Album_model->update_picture($data);
				}
				$redirect_path = 'Album/picture/?album_id='.$album_id;
				redirect($redirect_path, $data);
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
			$Album  = $this->Album_model->get_Album($this->session->userdata('user_id'));
			$Album_data = $Album->result();
			$json_array = array();
			$count = 0;
			foreach ($Album_data as $input) 
			{
				foreach ($input as $key => $value) 
				{
					$json_array['album'][$count][$key] = $value;
				}
				$Pics = $this->Album_model->get_pictures_from_album($json_array['album'][$count]['album_id']);
				$Pic_data = $Pics->result();
				$json_array['album'][$count]['pictures'] = $Pic_data;
				$count++;
			} 
			echo json_encode($json_array, true);
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
		/*
		$data1 = $this->Account_model->get_account($this->session->userdata('user_id'));
		//$data = $this->Project_model->get_pictures($this->session->userdata('user_id'));
		$mydata1 = $data1->result();
		//$mydata = $data->result();
		$array = array();
		//foreach($mydata as $dataArray)
		//{
		$count = 0;
			foreach($mydata1 as $input)
			{
				foreach($input as $key => $value)
				{
					$array['album'][$count][$key] = $value;
				}
				$data = $this->Project_model->get_pictures($array['album'][$count]['username']);
				$array['album'][0]['pictures'] = $mydata;
				$count++;
			}

		//print_r($array);

		//print_r($array['album'][0]);
		//echo json_encode($array, true);*/
		$data = $this->Album_model->get_pictures($this->session->userdata('user_id'));
		echo json_encode($data->result(), true);

	}
}
?>