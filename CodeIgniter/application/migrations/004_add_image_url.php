<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Image_Url extends CI_Migration {

	public function up()
	{
		// Add columns in table 'hotels'
		$this->dbforge->add_column('hotels', array(
			'image_url' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
				'null' => TRUE,
			),
		));
	}

	public function down()
	{
		$this->dbforge->drop_column('hotels', 'image_url');
	}
}
