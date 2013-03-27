<?php
class Room_manager extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_rooms($hotel_code=NULL) {
		$room_array = array();
		
		$sql;
		if ($hotel_code === NULL) {
			$sql = 'SELECT * FROM rooms';
		} else {
			$format = 'SELECT * FROM rooms WHERE hotel_code =\'%s\'';
			$sql = sprintf($format, $hotel_code);
		}

		include APPPATH .'models/room.php';
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
				array_push($room_array, new Room($row));
		}
		
		return $room_array;
	}

	function delete_all_hotels() {
		$query = $this->db->query('DELETE * FROM rooms');
	}

}