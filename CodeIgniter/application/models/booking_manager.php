<?php

class Booking_Manager extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function get_booking($id) {
		$sql = 'SELECT * FROM bookings WHERE id=' . $id;
		$query = $this->db->query($sql);
		$row = $query->row_array();
		include APPPATH . 'models/booking.php';
		return new Booking($row);
	}

	function new_booking($attr) {
		include APPPATH . 'models/booking.php';
		$booking = new Booking($attr);
		return $booking;
	}

	function get_all_bookings() {
		$sql = 'SELECT * FROM bookings';
		$query = $this->db->query($sql);
		$bookings = array();		
		
		foreach($query->result_array() as $row) {
			array_push($bookings, new Booking($row));
		}
		return $bookings;
	}
}
