<?php

class Hotel_Feature_Manager extends CI_Model {

	function __construct() {
		parent::__construct();
		include APPPATH . 'models/hotel_feature.php';
	}

	function new_hotelfeature($attr) {
		return new Hotelfeature($attr);
	}

	function get_hotels($feature_id) {
		$sql = 'SELECT hotel_code FROM hotel_features WHERE feature_id=' . $feature_id;
		$query = $this->db->query($sql);
		$this->load->models('Hotel_manager');
		$hotels = array();
		foreach($query->result_array() as $row) {
			array_push($hotels, Hotel_manager->get_hodel($row['hotel_code']));
		}
		return $hotels;
	}

	function get_features($hotel_code) {
		$sql = 'SELECT feature_id FROM hotel_features WHERE hotel_code=' . $hotel_code;
		$query = $this->db->query($sql);
		$this->load->models('Hotel_manager');
		$features = array();
		foreach($query->result_array() as $row) {
			array_push($features, Feature_manager->get_feature($row['feature_id']));
		}
		return $features;
	}

	function get_all_hotel_features() {
		$sql = 'SELECT * FROM hotel_features';
		$query = $this->db->query($sql);
		$hotel_features = array();		
		
		foreach($query->result_array() as $row) {
			array_push($hotel_features, new Hotel_Feature($row));
		}
		return $hotel_features;
	}
}

?>
