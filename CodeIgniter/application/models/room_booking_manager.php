<?php
class Room_booking_manager extends CI_Model {
	function __construct() {
		parent::__construct();
		include APPPATH.'models/room_booking.php';
	}

	/*
	function get_all_room_booking($hotel_code=NULL) {
		$result_array = array();

		$sql;
		if ($hotel_code === NULL) {
			$sql = 'SELECT * FROM room_booking';
		} else {
			$format = 'SELECT * FROM room_booking WHERE hotel_code = \'%s\'';
			$sql = sprintf($format, $hotel_code);
		}

		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
			array_push($result_array, new Room_booking($row));
		}

		return $result_array;
	}
	*/

	function get_room_booking($room_code=NULL, $hotel_code=NULL, $booking_id=NULL) {
		$sql;
		if ($room_code === NULL && $hotel_code === NULL && $booking_id === NULL) {
			$sql = 'SELECT * FROM room_booking';
		} else {
			$sql = 'SELECT * FROM room_booking WHERE';
			$flag = FALSE;
			
			if ($room_code <> NULL) {
				$format = ' room_code = %d';
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

			if ($booking_id <> NULL) {
				$format = ' booking_id = %d';
				$clause = sprintf($format, $booking_id);
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
				array_push($result_array, new Room_booking($row));
			}
			return $result_array;
		} else {
			return NULL;
		}
	}

	function delete_all_room_booking($hotel_code=NULL) {
		$sql;
		if ($hotel_code === NULL) {
			$sql = 'DELETE * FROM room_booking';
		} else {
			$format = 'DELETE * FROM room_booking WHERE hotel_code = \'%s\'';
			$sql = sprintf($format, $hotel_code);
		}
		$query = $this->db->query($sql);
	}
}