<?php
class Room extends CI_Model{
	var $room_code = '';
	var $num_bed = 0;
	var $comfort_level = '';
	var $hotel_code = '';
	var $max_capacity = 0;

	function __construct($data=NULL) {
		parent::__construct();

		if ($data != NULL) {
			if (is_array($data)) {
				$this->room_code = $data['hotel_code'];
				$this->num_bed = $data['num_bed'];
				$this->comfort_level = $data['comfort_level'];
				$this->hotel_code = $data['hotel_code'];
				$this->max_capacity = $data['max_capacity'];
			} else {	
				$this->room_code = $data->room_code;
				$this->num_bed = $data->num_bed;
				$this->comfort_level = $data->confort_level;
				$this->hotel_code = $data->hotel_code;
				$this->max_capacity = $data->max_capacity;
			}
		}
	}

	function _insert() {
		$room_code = $this->room_code;
		$num_bed = $this->num_bed;
		$comfort_level = $this->comfort_level;
		$hotel_code = $this->hotel_code;
		$max_capacity = $this->max_capacity;
		
		$format = 'INSERT INTO rooms (room_code, num_bed, comfort_level, hotel_code, max_capacity) VALUES(\'%s\', %d, \'%s\', \'%s\', %d)';
		$sql = sprintf($format, $room_code, $num_bed, $comfort_level, $hotel_code, $max_capacity);
		
		$query = $this->db->query($sql);
	}

	function _update() {
		$format = 'UPDATE rooms SET num_bed=%d, comfort_level=\'%s\', max_capacity=%d WHERE room_code=\'%s\' AND hotel_code=\'%s\'';
		$sql = sprintf($format, $this->num_bed, $this->comfort_level, $this->max_capacity, $this->room_code, $this->hotel_code);
		
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