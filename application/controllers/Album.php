<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Album extends CI_Controller 
{
	public function __construct() 
	{
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
			$this->load->view('album/album.php');
			//$this->load->view('templates/footer.php');
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
			redirect('Album');
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
				$this->load->view('album/album_picture.php');
				//$this->load->view('templates/footer.php');
			}
			else
			{
				$this->load->view('templates/header.php');
				$this->load->view('access_denied.php');
				//$this->load->view('templates/footer.php');
			}
			
		}
	}

	public function upload_picture()
	{
		if($this->access())
		{


			$album_id = $this->session->userdata('album_id');

			$pic_id = $this->uniqid_base36(true);
			

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
				redirect($redirect_path);
			}
			else
			{
				$this->load->view('templates/header.php');
				echo 'error';
				//$this->load->view('templates/footer.php');
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
			$album_id = $this->session->userdata('album_id');
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
			$this->Album_model->update_picture($clean);

			$redirect_path = 'Album/picture/?album_id='.$album_id;
			redirect($redirect_path);
		}
	}

	public function deletePicture()
	{
		if($this->access())
		{
			$album_id = $this->session->userdata('album_id');
			$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
			$this->Album_model->delete_picture($clean);
			//delete_files('/Library/WebServer/Documents/pinoram/pinoram-production/files/images/'.$clean['delete_pic'].'.jpg');
			unlink('/Library/WebServer/Documents/pinoram/pinoram-production/files/images/'.$clean['delete_pic'].'.jpg');
			$redirect_path = 'Album/picture/?album_id='.$album_id;
			redirect($redirect_path);
		}
	}

	public function map()
	{
		/*if($this->access())
		{
			
			$this->load->view('templates/header.php');
			$this->load->view('album/map.php');
		}*/
		if($this->access())
		{	
			if(isset($_GET['album_id']))
			{
				$album_id = $_GET['album_id'];
				//$this->session->set_userdata('album_id', $album_id);
				$this->load->view('templates/header.php');
				$this->load->view('album/map.php');
				//$this->load->view('templates/footer.php');
			}
			else
			{
				$this->load->view('templates/header.php');
				$this->load->view('access_denied.php');
				//$this->load->view('templates/footer.php');
			}
			
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

        $this->load->view('album/test.php');
	}

	public function testexif()
	{
		$this->load->view('templates/header.php');
        $this->load->view('album/exiftest.php');
	}

	public function test_post()
	{
		$data = $this->Album_model->get_pictures($this->session->userdata('user_id'));
		echo json_encode($data->result(), true);

	}
}
?>