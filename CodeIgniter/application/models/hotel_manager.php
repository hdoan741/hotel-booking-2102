<?php
class Hotel_manager extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_all_hotels() {
		$query = $this->db->query('SELECT * FROM hotels');
		return $query->result();
	}

	function delete_all_hotels() {
		$query = $this->db->query('DELETE * FROM hotels');
	}

}