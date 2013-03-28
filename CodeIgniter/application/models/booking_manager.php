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
}
