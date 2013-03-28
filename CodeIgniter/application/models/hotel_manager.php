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

}