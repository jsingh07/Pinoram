<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
	parent::__construct();

	$this->load->helper('url');
	// Load form helper library
	$this->load->helper('form');

	// Load form validation library
	$this->load->library('form_validation');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('templates/header.php');
	
		if($this->session->userdata('logged_in') == TRUE)
	    {
	    	if($this->session->userdata('welcome') == TRUE)
			{
				$this->session->set_userdata('welcome') == FALSE;
				$text['mytext'] = "Welcome ".$this->session->userdata('first_name');
				$info['success'] = $this->load->view('setupdb/success.php', $text, TRUE);
				$data['load'] = $this->load->view('home/Greeting.php', $info, TRUE);
			}
			else if(NULL !== $this->session->flashdata("hometoastmsg"))
			{
				$text['mytext'] = $this->session->flashdata("hometoastmsg");
				$this->session->set_flashdata("hometoastmsg", "");
				$info['success'] = $this->load->view('setupdb/success.php', $text, TRUE);
				$data['load'] = $this->load->view('home/Greeting.php', $info, TRUE);
			}
			else
			{
				$data['load'] = $this->load->view('home/Greeting.php', NULL, TRUE);
			}
	    }
	    else
	    {
	    	$data['msg'] = "";
	    	$data['load'] = $this->load->view('login/registration_form.php', $data, TRUE);
	    }
		
		$this->load->view('home/home.php', $data);
	}

	public function about_us()
	{
		$this->load->view('templates/header.php');
		$this->load->view('aboutus');
	}

}
?>