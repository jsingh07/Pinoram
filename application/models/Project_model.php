<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

	public function __construct() {}

	public function create_project($data, $user_id, $access)
	{
		$string =
		array(
		'project_name' => $data['project_title'],
		'description' => $data['project_description'],
		'project_access' => $access,
		'owner_id' => $user_id
		);

		$q = $this->db->insert_string('projects',$string);             
        $this->db->query($q);

        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function get_pictures($user_id)
	{
		$sql = "SELECT * FROM pictures WHERE owner_id = $user_id";
        $result = $this->db->query($sql);
        return $result;
	}

	public function insert_picture($user_id)
	{
		$sql = "INSERT INTO pictures (owner_id) VALUES ($user_id)";
        $this->db->query($sql);

        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

	public function update_picture($data)
	{
		$picture_id = $data['picture_id'];

		$mydata =
		array(
		'lat' => $data['Latitude'],
		'lng' => $data['Longitude'],
		'address' => $data['Address'],
		'description' => $data['picture_description']
		);
		
		$this->db->where('picture_id', $picture_id);
		$this->db->update('pictures', $mydata);
	}

	public function delete_picture($data)
	{
		$picture_id = $data['delete_pic'];
		$path = "files/images/".$picture_id.".jpg";
		$sql = "DELETE FROM pictures WHERE picture_id = $picture_id";
		$query = $this->db->query($sql);
		unlink($path);
	}

}

?>