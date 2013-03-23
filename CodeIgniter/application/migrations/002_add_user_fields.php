<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User_Fields extends CI_Migration {

	public function up()
	{
		// Add columns for table 'users'
		$this->dbforge->add_column('users', array(
			'address' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
				'null' => TRUE,
			),
			'card_no' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
				'null' => TRUE,
			),
			'user_type' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE,
			),
		));
	}

	public function down()
	{
		$this->dbforge->drop_column('users', 'address');
		$this->dbforge->drop_column('users', 'card_no');
		$this->dbforge->drop_column('users', 'user_type');
	}
}
