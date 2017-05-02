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
	public function get_UserInfo($album_id)
	{
		$sql="SELECT owner_id FROM album 
			  WHERE album_id = '$album_id'";
		$result = $this->db->query($sql);
		$owner = $result->row();
		$id = $owner->owner_id;
	
		$sql = "SELECT user.username, user.profile_pic, album.description, album.album_name
				FROM user INNER JOIN album 
				WHERE user.user_id = $id AND album.album_id = '$album_id'";

		$result = $this->db->query($sql);
		return $result; 

	}


	public function get_Album($user_id)
	{
		$sql = "SELECT * FROM album 
				WHERE owner_id = $user_id
				";
		$result = $this->db->query($sql);
		return $result;
	}

	public function get_user_data($username)
	{
		$sql = "SELECT user_id, bio FROM user
				WHERE username = '$username'";
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

	public function get_public_album($user_id)
	{
		$sql = "SELECT * FROM album 
				WHERE owner_id = $user_id
				AND album_access = 'public'
				";
		$result = $this->db->query($sql);
		return $result;
	}

	public function get_public_album_all()
	{
		$sql = "SELECT * FROM album 
				WHERE album_access = 'public'
				";
		$result = $this->db->query($sql);
		return $result;
	}

	public function get_public_picture($album_id)
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

	public function verify_owner($album_id, $user_id)
	{
		$sql = "SELECT owner_id FROM album WHERE album_id = '$album_id' AND owner_id = $user_id";
        $result = $this->db->query($sql);
        if(empty($result->result()))
        {
        	return FALSE;
        }
        else
        {
        	return TRUE;
        }
	}

	public function is_public_album($album_id)
	{
		$sql = "SELECT * FROM album WHERE album_id = '$album_id' AND album_access = 'public'";
        $result = $this->db->query($sql);
        if(empty($result->result()))
        {
        	return FALSE;
        }
        else
        {
        	return TRUE;
        }
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

	public function edit_Album($data, $user_id, $access, $album_id)
	{
		$mydata = 
		array(
		'album_name' => $data['Album_title'], 
		'description' => $data['Album_description'],
		'album_access' => $access
		);
		$this->db->where('album_id', $album_id);
		$this->db->update('album', $mydata);
	}

	public function delete_picture($data)
	{
		$picture_id = $data['delete_pic'];
		$path = "files/images/".$picture_id.".jpg";
		$sql = "DELETE FROM pictures WHERE picture_id = '$picture_id'";
		$query = $this->db->query($sql);
		unlink($path);
	}

	public function delete_Album($album_id)
	{
		$sql = "SELECT * FROM pictures WHERE album_id = '$album_id'";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row) 
		{
			$data  = array(
			'delete_pic' => $row->picture_id
			);
			$this->delete_picture($data);
		}
		$sql = "DELETE FROM album WHERE album_id = '$album_id'";
		$this->db->query($sql);
	}

}

?>