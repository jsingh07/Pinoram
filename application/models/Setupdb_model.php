<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

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
			'verified' => array(
				'type' => 'TINYINT',
				'constraint' => 1
			),
			'admin' => array(
				'type' => 'TINYINT',
				'constraint' => 1
			)
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->add_key(array('username', 'email'));
		$this->dbforge->create_table('user', TRUE);
	}

	public function dropUser()
	{
		$this->load->dbforge();
		$this->dbforge->drop_table('user',TRUE);
	}

}
?>