<?php
class Room_manager extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->model('Room');
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

	function get_rooms_by_group($hotel_code) {
		$format = '	SELECT *, COUNT(*) AS amount FROM rooms
					WHERE hotel_code = \'%s\'
					GROUP BY type, comfort_level, price';
		$sql = sprintf($format, $hotel_code);
		$query = $this->db->query($sql);
		$result_array = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = array('room_code' => $row->room_code,
					'type' => $row->type,
					'comfort_level' => $row->comfort_level,
					'price' => $row->price,
					'amount' => $row->amount);
				array_push($result_array, $data);
			}
		} 
		return $result_array;
	}

	function get_available_rooms_by_group($hotel_code, $start_date, $end_date, $type, $comfort_level, $price) {

 		$format = 'SELECT * FROM rooms r'
                        . ' WHERE r.room_code NOT IN ('
                        .       ' SELECT DISTINCT rb.room_code FROM room_booking rb, bookings b'
                        .       ' WHERE rb.booking_id = b.id'
                        .       ' AND ('
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date >= \'%s\' AND b.end_date <= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .       ' )'
                        . ' )'
                        . ' AND r.hotel_code = \'%s\''
                        . ' AND r.type = \'%s\''
                        . ' AND r.comfort_level = \'%s\''
                        . ' AND r.price = %d';
         $sql = sprintf($format, $end_date, $end_date, $start_date, $start_date, 
			$start_date, $end_date, $start_date, $end_date, $hotel_code, $type, $comfort_level, $price);
		$query = $this->db->query($sql);

		$result_array = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = array('room_code' => $row->room_code,
					'hotel_code' => $row->hotel_code,
					'type' => $row->type,
					'comfort_level' => $row->comfort_level,
					'price' => $row->price);
				array_push($result_array, $data);
			}
		} 
		return $result_array;
	}

	function get_available_rooms_all_groups($hotel_code, $start_date, $end_date) {
		/*
		$format = 'CREATE VIEW rooms_view AS'
						. '(SELECT * FROM rooms r'.
                        . ' WHERE r.room_code NOT IN ('
                        .       ' SELECT DISTINCT rb.room_code FROM room_booking rb, bookings b'
                        .       ' WHERE rb.booking_id = b.id'
                        .       ' AND ('
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date >= \'%s\' AND b.end_date <= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .       ' )'
                        . ' )'
                        . ' AND r.hotel_code = \'%s\''
                        .');'
				.  'SELECT *, COUNT(*) AS available_no FROM rooms_view
					WHERE hotel_code = \'%s\'
					GROUP BY type, comfort_level, price';
        $sql = sprintf($format, $end_date, $end_date, $start_date, $start_date, 
			$start_date, $end_date, $start_date, $end_date, $hotel_code, $hotel_code);*/
 		$format = 'SELECT *, COUNT(*) AS available_no FROM rooms r'
                        . ' WHERE r.room_code NOT IN ('
                        .       ' SELECT DISTINCT rb.room_code FROM room_booking rb, bookings b'
                        .       ' WHERE rb.booking_id = b.id'
                        .       ' AND ('
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date >= \'%s\' AND b.end_date <= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .       ' )'
                        . ' )'
                        . ' AND r.hotel_code = \'%s\''
                        . ' GROUP BY type, comfort_level, price';
         $sql = sprintf($format, $end_date, $end_date, $start_date, $start_date, 
			$start_date, $end_date, $start_date, $end_date, $hotel_code);
		$query = $this->db->query($sql);

		$result_array = array();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data = array(
					'hotel_code' => $row->hotel_code,
					'type' => $row->type,
					'comfort_level' => $row->comfort_level,
					'price' => $row->price,
					'available_no' => $row->available_no);
				array_push($result_array, $data);
			}
		} 
		return $result_array;
	}

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

	function delete_room($room_code=NULL, $hotel_code=NULL) {
		$sql;
		if ($room_code === NULL && $hotel_code === NULL) {
			$sql = 'DELETE FROM rooms';
		} else {
			$sql = 'DELETE FROM rooms WHERE';
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
	}

	function delete_all_rooms() {
		$query = $this->db->query('DELETE FROM rooms');
	}

	function search($hotel_code, $start_date, $end_date) {
                $format = 'SELECT r.room_code FROM rooms r'
                        . ' WHERE r.room_code NOT IN ('
                        .       ' SELECT DISTINCT rb.room_code FROM room_booking rb, bookings b'
                        .       ' WHERE rb.booking_id = b.id'
                        .       ' AND ('
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date >= \'%s\' AND b.end_date <= \'%s\')'
                        .               ' OR'
                        .               ' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
                        .       ' )'
                        . ' )'
                        . ' AND r.hotel_code = \'%s\'';
                $sql = sprintf($format, $end_date, $end_date, $start_date, $start_date, 
			$start_date, $end_date, $start_date, $end_date, $hotel_code);
		$query = $this->db->query($sql);
                $rooms = array();
                foreach ($query->result_array() as $row) {
                        array_push($rooms, $this->get_room($row['room_code']));
                }
                return $rooms;
        }

}
