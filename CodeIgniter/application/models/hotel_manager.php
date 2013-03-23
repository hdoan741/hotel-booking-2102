<?php
class Hotel_manager extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_hotels() {
		include APPPATH .'models/hotel.php';
		$query = $this->db->query('SELECT * FROM hotels');
		$hotel_array = array();
		foreach ($query->result_array() as $row) {
			array_push($hotel_array, new Hotel($row));
		}
		return $hotel_array;
	}

	function delete_all_hotels() {
		$query = $this->db->query('DELETE * FROM hotels');
	}

}