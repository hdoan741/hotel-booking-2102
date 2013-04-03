<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Remove_Room_Fields extends CI_Migration {

	public function up()
	{
		// Remove columns in table 'rooms'
		$this->dbforge->drop_column('rooms', 'fee');
		$this->dbforge->drop_column('rooms', 'num_bed');
		// Add type column
		$this->dbforge->add_column('rooms', array(
			'type' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
				'null' => TRUE,
			),
		));
	}

	public function down()
	{
		$this->dbforge->drop_column('rooms', 'type');
		$this->dbforge->add_column('rooms', array(
			'fee' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'num_bed' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
		));
	}
}
