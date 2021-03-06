<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setupdb_model extends CI_Model {

	public function __construct() {}

	public function InstallUser()
	{
		$this->load->dbforge();

		$fields = array(
			'user_id' => array(
				'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
                'constraint' => 30,
                'unique' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => TRUE
			),
			'password' => array(
				'type' => 'VARCHAR',
                'constraint' => 64
			),
			'first_name' => array(
				'type' => 'VARCHAR',
                'constraint' => 64
			),
			'last_name' => array(
				'type' => 'VARCHAR',
                'constraint' => 64
			),
			'last_login' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'status' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'role' => array(
				'type' => 'VARCHAR',
				'constraint' => 20
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->add_key(array('username', 'email'));
		$this->dbforge->create_table('user', TRUE);
	}

	public function InstallToken()
	{
		$this->load->dbforge();

		$fields = array(
			'token_id' => array(
				'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'user_id' => array(
				'type' => 'INT',
                'constraint' => 5,
                'unique' => TRUE
			),
			'token' => array(
				'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => TRUE
			),
			'created' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('token_id', TRUE);
		$this->dbforge->create_table('token', TRUE);
	}

	public function InstallUser_info()
	{
		$this->load->dbforge();

		$fields = array(
			'user_id' => array(
				'type' => 'INT',
                'constraint' => 5,
                'unique' => TRUE
			),
			'phone' => array(
				'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => TRUE
			),
			'location' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'bio' => array(
				'type' => 'VARCHAR',
				'constraint' => 999,
				'null' => TRUE
			),
			'linkedin' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'facebook' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'twitter' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'instagram' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'youtube' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			),
			'website' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => TRUE
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->create_table('user_info', TRUE);
	}

	public function InstallAlbum()
	{
		$this->load->dbforge();

		$fields = array(
			'album_id' => array(
				'type' => 'VARCHAR',
                'constraint' => 40
			),
			'owner_id' => array(
				'type' => 'INT'
			),
			'album_name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 999,
				'null' => TRUE
			),
			'album_access' => array(
				'type' => 'VARCHAR',
				'constraint' => 30
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('album_id', TRUE);
		$this->dbforge->create_table('album', TRUE);
	}

	public function InstallPictures()
	{
		$this->load->dbforge();

		$fields = array(
			'picture_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 40
			),
			'owner_id' => array(
				'type' => 'INT'
			),
			'album_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 40
			),
			'lat' => array(
				'type' => 'DECIMAL(10,6)',
				'null' => TRUE
			),
			'lng' => array(
				'type' => 'DECIMAL(10,6)',
				'null' => TRUE
			),
			'address' => array(
				'type' => 'VARCHAR',
				'constraint' => 80,
				'null' => TRUE
			),
			'date' => array(
				'type' => 'VARCHAR',
				'constraint' => 30,
				'null' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500,
				'null' => TRUE
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('picture_id', TRUE);
		$this->dbforge->create_table('pictures', TRUE);
	}

	public function Installvideos()
	{
		$this->load->dbforge();

		$fields = array(
			'video_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '50'
			),
			'owner_id' => array(
				'type' => 'INT'
			),
			'lat' => array(
				'type' => 'DECIMAL(10,6)',
				'null' => TRUE
			),
			'lng' => array(
				'type' => 'DECIMAL(10,6)',
				'null' => TRUE
			),
			'date' => array(
				'type' => 'VARCHAR',
				'constraint' => 30,
				'null' => TRUE
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 500,
				'null' => TRUE
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('video_id', TRUE);
		$this->dbforge->create_table('videos', TRUE);
	}

	public function InstallAlbum_pictures()
	{
		$this->load->dbforge();

		$fields = array(
			'Album_id' => array(
				'type' => 'INT'
			),
			'picture_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '50'
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('Album_pictures', TRUE);
	}

	public function InstallAlbum_videos()
	{
		$this->load->dbforge();

		$fields = array(
			'Album_id' => array(
				'type' => 'INT'
			),
			'video_id' => array(
				'type' => 'VARHCAR',
				'constraint' => '50'
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('Album_videos', TRUE);
	}



	public function dropUser()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('user',TRUE);
	}

	public function dropToken()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('token',TRUE);
	}

	public function dropUser_info()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('user_info',TRUE);
	}

	public function dropAlbum()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('album',TRUE);
	}

	public function dropPictures()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('pictures',TRUE);
	}

	public function dropVideos()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('videos',TRUE);
	}

	public function dropAlbum_pictures()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('Album_pitures',TRUE);
	}

	public function dropAlbum_videos()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('Album_videos',TRUE);
	}

	public function showUser()
	{
		$sql = "SELECT * FROM user";
		$query = $this->db->query($sql);
		return $query;
	}

	public function showToken()
	{
		$sql = "SELECT * FROM token";
		$query = $this->db->query($sql);
		return $query;
	}

/*-----------------------------------------------------------------
-----------------------contents------------------------------------
-------------------------------------------------------------------*/

	public function addContent_User()
	{
		$data = array(
			array(
			'username' => "phein",
			'email' => "pyai.hein@gmail.com",
			'password' => "helloworld",
			'first_name' => "pyai",
			'last_name' => "hein",
			'status' => "approved",
			'role' => "admin"
			),
			array(
			'username' => "rhein",
			'email' => "xrnhein@gmail.com",
			'password' => "helloworld",
			'first_name' => "ron",
			'last_name' => "hein",
			'status' => "pending",
			'role' => "subscriber"
			)
		);
		$this->db->insert_batch('user', $data);
	}

	public function addContent_Token()
	{
		$data = array(
			array(
			'user_id' => 1,
			'token' => "c60a911befaae89987bae7c3f21765",
			'created' => "Fri, 17 Mar 17 12:30:25 -0700"
			),
			array(
			'user_id' => 2,
			'token' => "6c5ee86c13422b51bea31aebf0d66f",
			'created' => "Fri, 17 Mar 17 12:30:47 -0700"
			)
		);
		$this->db->insert_batch('token', $data);
	}

	public function dropContent_User()
	{
		$this->db->truncate('user');
	}

	public function dropContent_Token()
	{
		$this->db->truncate('token');
	}

	public function getUser($id)
	{
		$sql = "SELECT username FROM user WHERE user_id = $id";
		$query = $this->db->query($sql);
		return $query;
	}

	public function editUser($id)
	{
		$sql = "DELETE FROM user WHERE user_id = $id";
		$query = $this->db->query($sql);
		return $query;
	}

	public function editToken($id)
	{
		$sql = "DELETE FROM token WHERE token_id = $id";
		$query = $this->db->query($sql);
		return $query;
	}

	public function makeAdmin($id)
	{
		$sql = "UPDATE user SET role = 'admin' WHERE user_id = $id";
		$query = $this->db->query($sql);
		return $query;
	}

}
?>