<?php
class Hotel extends CI_Model{
	var $hotel_code = '';
	var $name = '';
	var $location = '';
	var $image_url = '';

	function __construct($data=NULL) {
		parent::__construct();

		if ($data != NULL) {
			if (is_array($data)) {
				$this->hotel_code = $data['hotel_code'];
				$this->name = $data['name'];
				$this->location = $data['location'];
				$this->image_url = $data['image_url'];
			} else {	
				$this->hotel_code = $data->hotel_code;
				$this->name = $data->name;
				$this->location = $data->location;
				$this->image_url = $data['image_url'];
			}
		}
	}

	function _insert() {
		$name = $this->name;
		$location = $this->location;
		$hotel_code = $this->hotel_code;
		$image_url = $this->image_url;
		
		$format = 'INSERT INTO hotels (name, location, hotel_code, image_url) VALUES(\'%s\', \'%s\', \'%s\', \'%s\')';
		$sql = sprintf($format, $name, $location, $hotel_code, $image_url);
		
		$this->db->query($sql);
	}

	function _update() {
		$format = 'UPDATE hotels SET name=\'%s\', location=\'%s\', image_url=\'%s\' WHERE hotel_code=\'%s\'';
		$sql = sprintf($format, $this->name, $this->location, $this->image_url,$this->hotel_code);
		
		$this->db->query($sql);
	}

	function inTable() {
		$sql = 'SELECT * FROM hotels WHERE hotel_code=\''.$this->hotel_code.'\'';
		
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function save() {
		if ($this->inTable()) {
			$this->_update();
		} else {
			$this->_insert();
		}
	}

	function delete() {
		if ($this->inTable()) {
			$format = 'DELETE FROM hotels WHERE hotel_code=\'%s\'';
			$sql = sprintf($format, $this->hotel_code);
			$this->db->query($sql);
		}
	}
}