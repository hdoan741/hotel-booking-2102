<?php
class Hotel extends CI_Model{
	var $hotel_code = '';
	var $name = '';
	var $location = '';

	function __construct() {
		parent::__construct();
	}

	function _insert() {
		$name = $this->name;
		$location = $this->location;
		$hotel_code = $this->hotel_code;
		
		$format = 'INSERT INTO hotels (name, location, hotel_code) VALUES(\'%s\', \'%s\', \'%s\')';
		$sql = sprintf($format, $name, $location, $hotel_code);
		
		$this->db->query($sql);
	}

	function _update() {
		$format = 'UPDATE hotels SET name=\'%s\', location=\'%s\' WHERE hotel_code=\'%s\'';
		$sql = sprintf($format, $this->name, $this->location, $this->hotel_code);
		
		$this->db->query($sql);
	}

	function _inInTable() {
		$sql = 'SELECT * FROM hotels WHERE hotel_code=\''.$this->hotel_code.'\'';
		
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function save() {
		if ($this->_inInTable()) {
			$this->_update();
		} else {
			$this->_insert();
		}
	}
}