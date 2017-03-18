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

}
?>