<?php
class Room extends CI_Model{
	var $room_code = '';
	var $type = '';
	var $comfort_level = '';
	var $hotel_code = '';
	var $max_capacity = 0;
	var $price = 0;

	function __construct($data=NULL) {
		parent::__construct();

		if ($data != NULL) {
			if (is_array($data)) {
				$this->room_code = $data['room_code'];
				$this->type = $data['type'];
				$this->comfort_level = $data['comfort_level'];
				$this->hotel_code = $data['hotel_code'];
				$this->max_capacity = $data['max_capacity'];
				$this->price = $data['price'];
			} else {	
				$this->room_code = $data->room_code;
				$this->type = $data->type;
				$this->comfort_level = $data->confort_level;
				$this->hotel_code = $data->hotel_code;
				$this->max_capacity = $data->max_capacity;
				$this->price = $data->price;
			}
		}
	}

	function _insert() {
		$room_code = $this->room_code;
		$type = $this->type;
		$comfort_level = $this->comfort_level;
		$hotel_code = $this->hotel_code;
		$max_capacity = $this->max_capacity;
		$price = $this->price;
		
		$format = 'INSERT INTO rooms (room_code, type, comfort_level, hotel_code, max_capacity, price) VALUES(\'%s\', \'%s\', \'%s\', \'%s\', %d, %d)';
		$sql = sprintf($format, $room_code, $type, $comfort_level, $hotel_code, $max_capacity, $price);
		
		$query = $this->db->query($sql);
	}

	function _update() {
		$format = 'UPDATE rooms SET type=\'%s\', comfort_level=\'%s\', max_capacity=%d, price=%d WHERE room_code=\'%s\' AND hotel_code=\'%s\'';
		$sql = sprintf($format, $this->type, $this->comfort_level, $this->max_capacity, $this->price, $this->room_code, $this->hotel_code);
		
		$query = $this->db->query($sql);
	}

	function _inTable() {
		$format = 'SELECT * FROM rooms WHERE room_code=\'%s\' AND hotel_code=\'%s\'';
		$sql = sprintf($format, $this->room_code, $this->hotel_code);
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function save() {
		if ($this->_inTable()) {
			$this->_update();
		} else {
			$this->_insert();
		}
	}

	function delete() {
		if ($this->_inInTable()) {
			$format = 'DELETE FROM rooms WHERE room_code=\'%s\' AND hotel_code=\'%s\'';
			$sql = sprintf($format, $this->room_code, $this->hotel_code);
			$this->db->query($sql);
		}
	}
}
