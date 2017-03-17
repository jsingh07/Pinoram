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

	public function dropContent_User()
	{
		$this->db->truncate('user');
	}

}
?>