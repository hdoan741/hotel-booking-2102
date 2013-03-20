<?php
class Hotels_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_all_hotels() {
		$query = $this->db->query('SELECT * FROM hotels');
		return $query->result();
	}

	public function get_hotel($hotel_code) {
		$query = $this->db->query("SELECT * FROM hotels WHERE hotel_code='" .hotel_code. "'");
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			echo 'Hotel code not in hotels table';
		}
	}
}