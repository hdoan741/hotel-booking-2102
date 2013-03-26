<?php

class Bookingmanager extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function get_user($id) {
		$sql = 'SELECT * FROM bookings WHERE id=' . $id;
		$query = $this->db->query($sql);
		$row = $query->row_array();
		include APPPATH . 'models/booking.php';
		return new Booking($row);
	}
}
