<?php
class Room_manager extends CI_Model {

	function __construct() {
		parent::__construct();
		include APPPATH .'models/room.php';
	}

	/*
	function get_all_rooms($hotel_code=NULL) {
		$room_array = array();
		
		$sql;
		if ($hotel_code === NULL) {
			$sql = 'SELECT * FROM rooms';
		} else {
			$format = 'SELECT * FROM rooms WHERE hotel_code =\'%s\'';
			$sql = sprintf($format, $hotel_code);
		}

	
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
				array_push($room_array, new Room($row));
		}
		
		return $room_array;
	}
	*/

	function get_room($room_code=NULL, $hotel_code=NULL) {
		$sql;
		if ($room_code === NULL && $hotel_code === NULL) {
			$sql = 'SELECT * FROM rooms';
		} else {
			$sql = 'SELECT * FROM rooms WHERE';
			$flag = FALSE;
			
			if ($room_code <> NULL) {
				$format = ' room_code = \'%s\'';
				$clause = sprintf($format, $room_code);
				if ($flag) {
					$sql = $sql.' AND'.$clause;
				} else {
					$sql = $sql.$clause;
				}
				$flag = TRUE;
			} 
			if ($hotel_code <> NULL) {
				$format = ' hotel_code = \'%s\'';
				$clause = sprintf($format, $hotel_code);
				if ($flag) {
					$sql = $sql.' AND'.$clause;
				} else {
					$sql = $sql.$clause;
				}
				$flag = TRUE;
			}
		}

		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result_array = array();
			foreach ($query->result_array() as $row) {
				array_push($result_array, new Room($row));
			}
			return $result_array;
		} else {
			return NULL;
		}
	}

	function delete_all_rooms() {
		$query = $this->db->query('DELETE * FROM rooms');
	}

}