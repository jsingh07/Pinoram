<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Account_model extends CI_Model {

	public function __construct() {}

	public function edit_profile($data, $user_id)
	{
		$mydata =
		array(
		'location' => $data['location'],
		'phone' => $data['phone'],
		'bio' => $data['bio'],
		'linkedin' => $data['linkedin'],
		'facebook' => $data['facebook'],
		'twitter' => $data['twitter'],
		'instagram' => $data['instagram'],
		'youtube' => $data['youtube'],
		'website' => $data['website']
		);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user_info', $mydata);
	}

	public function edit_account($data, $user_id)
	{
		$mydata =
		array(
		'username' => $data['username'],
		'first_name' => $data['first_name'],
		'last_name' => $data['last_name'],
		'email' => $data['email']
		);
		
		$this->db->where('user_id', $user_id);
		$this->db->update('user', $mydata);
	}

	public function get_profile($user_id)
	{
		$sql = "SELECT * FROM user_info WHERE user_id = $user_id";
		$query = $this->db->query($sql);
		return $query;
	}

	public function get_account($user_id)
	{
		$sql = "SELECT username,email,first_name,last_name FROM user_info WHERE user_id = $user_id";
		$query = $this->db->query($sql);
		return $query;
	}
}

