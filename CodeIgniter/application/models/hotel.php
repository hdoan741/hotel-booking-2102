<?php
class Hotel {
	var hotel_code = '';
	var name = '';
	var location = '';

	function __construct() {
		$this->load->database()
	}

	function __construct($data) {
		$this->load->database();

		$this->hotel_code = $data->hotel_code;
		$this->name = $data->name;
		$this->location = $data->location;
	}

	function _insert() {
		$name = $this->name;
		$location = $this->location;
		$format = 'INSERT INTO hotels (name, location) VALUES(\'%s\', \'%s\')';
		$sql = sprintf($format, $name, $location);
		$this->db->query($sql)
	}

	function _update() {
		$format = 'UPDATE hotels SET name=\'%s\', location=\'%s\' WHERE hotel_code=\'%s\'';
		$sql = sprintf($format, $this->name, $this->location);
		$this->db->query($sql);
	}

	function save() {
		if ($this->hotel_code === '') {
			$this->insert();
		} else {
			$this->update();
		}
	}
}