<?php
class Hotel_manager extends CI_Model {

	function __construct() {
		parent::__construct();
		include APPPATH .'models/hotel.php';
	}

	function get_all_hotels() {
		$query = $this->db->query('SELECT * FROM hotels');
		$hotel_array = array();
		foreach ($query->result_array() as $row) {
			array_push($hotel_array, new Hotel($row));
		}
		return $hotel_array;
	}

	function get_hotel($hotel_code) {
		if ($hotel_code === NULL) {
			return $this->get_all_hotels();
		}
		
		$format = 'SELECT * FROM hotels WHERE hotel_code = \'%s\'';
		$sql = sprintf($format, $hotel_code);
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return new Hotel($query->row_array());
		} else {
			return NULL;
		}
	}

	function delete_all_hotels() {
		$query = $this->db->query('DELETE * FROM hotels');
	}
	
	function search($location, $start_date, $end_date, $num_room) {
		$format = 'SELECT h.hotel_code FROM hotels h, bookings b, rooms r, room_booking rb'
			+ 'WHERE h.hotel_code = rb.hotel_code'
			+ 'AND h.hotel_code = r.hotel_code'
			+ 'AND r.room_code = rb.room_code'
			+ 'AND b.id = rb.booking_id'
			+ 'AND h.location = \'%s\''
			+ 'AND b.start_date > \'%s\''
			+ 'AND b.end_date < \'%s\''
			+ 'GROUP BY h.hotel_code'
			+ 'HAVING COUNT(r.room_code) >= %s';
		$sql = sprintf($format, $location, $start_date, $end_date, $num_room);
		$query = $this->db->query($sql);
		$hotels = array();
		foreach ($query->result_array() as $row) {
			array_push($hotels, get_hotel($row['hotel_code']));
		}
		return $hotels;
	}
}
