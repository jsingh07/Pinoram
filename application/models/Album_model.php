<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

	public function __construct() {}

	public function create_Album($data, $user_id, $access)
	{
		$string =
		array(
		'album_name' => $data['Album_title'],
		'description' => $data['Album_description'],
		'album_access' => $access,
		'owner_id' => $user_id
		);

		$q = $this->db->insert_string('album',$string);             
        $this->db->query($q);

        $insert_id = $this->db->insert_id();
        return $insert_id;
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
				WHERE album_id = $album_id
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

	public function insert_picture($user_id, $pic_id)
	{
		$sql = "INSERT INTO pictures (owner_id, picture_id) VALUES ($user_id, '$pic_id')";
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
		$sql = "DELETE FROM pictures WHERE picture_id = $picture_id";
		$query = $this->db->query($sql);
		unlink($path);
	}

}

?>