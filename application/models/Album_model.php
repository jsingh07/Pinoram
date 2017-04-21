<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct() {}

	public function create_Album($data, $user_id, $access, $album_id)
	{
		$Album_title = $data['Album_title'];
		$Album_description =$data['Album_description'];
		$sql = "INSERT INTO album (album_name, album_id, album_access, owner_id, description) 
				VALUES ('$Album_title', '$album_id', '$access', $user_id, '$Album_description')"; 

        $this->db->query($sql);
	}

	public function get_Album($user_id)
	{
		$sql = "SELECT * FROM album 
				WHERE owner_id = $user_id
				";
		$result = $this->db->query($sql);
		return $result;
	}

	public function get_pictures_from_album($album_id)
	{
		$sql = "SELECT * FROM pictures
				WHERE album_id = '$album_id'
				";
		$result = $this->db->query($sql);
		return $result;

	}

	public function get_pictures($user_id)
	{
		$sql = "SELECT * FROM pictures WHERE owner_id = $user_id";
        $result = $this->db->query($sql);
        return $result;
	}

	public function insert_picture($user_id, $pic_id, $album_id)
	{
		$sql = "INSERT INTO pictures (owner_id, picture_id, album_id) VALUES ($user_id, '$pic_id', '$album_id')";
        $this->db->query($sql);
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
		$sql = "DELETE FROM pictures WHERE picture_id = '$picture_id'";
		$query = $this->db->query($sql);
		unlink($path);
	}

}

?>