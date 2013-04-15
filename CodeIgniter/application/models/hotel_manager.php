<?php
class Hotel_manager extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->model('Hotel');
		$this->load->model('Hotel_Feature_Manager');
		$this->load->model('Room_manager');
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

	function get_all_hotel_available_details($hotel_code, $start_date, $end_date) {
		$hotel = $this->get_hotel($hotel_code);
		$features = $this->Hotel_Feature_Manager->get_features($hotel_code);
		$rooms = $this->Room_manager->get_available_count_all_groups($hotel_code, $start_date, $end_date);
		$data = array('hotel' => $hotel,
			'features' => $features,
			'rooms' => $rooms );
		return $data;
	}

	function get_all_hotel_details($hotel_code) {
		$hotel = $this->get_hotel($hotel_code);
		$features = $this->Hotel_Feature_Manager->get_features($hotel_code);
		$rooms = $this->Room_manager->get_rooms_by_group($hotel_code);
		$data = array('hotel' => $hotel,
			'features' => $features,
			'rooms' => $rooms );
		return $data;
	}

	function delete_all_hotels() {
		$query = $this->db->query('DELETE * FROM hotels');
	}
	
	function search($location, $start_date, $end_date, $num_room) {
		$format = 'SELECT h.hotel_code FROM hotels h, rooms r'
			. ' WHERE r.room_code NOT IN ('
			.	' SELECT DISTINCT rb.room_code FROM room_booking rb, bookings b'
			.	' WHERE rb.booking_id = b.id'
			.	' AND ('
			.		' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
			.		' OR'
			.		' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
			.		' OR'
			.		' (b.start_date >= \'%s\' AND b.end_date <= \'%s\')'
			.		' OR'
			.		' (b.start_date <= \'%s\' AND b.end_date >= \'%s\')'
			.	')'
			. ')'
			. ' AND h.hotel_code = r.hotel_code'
			. ' AND h.location = \'%s\''
			. ' GROUP BY h.hotel_code'
			. ' HAVING COUNT(h.hotel_code) >= %s';
		$sql = sprintf($format, $end_date, $end_date, $start_date, $start_date, $start_date, $end_date, 
				$start_date, $end_date, $location, $num_room);
		$hotels = array();
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row) {
			array_push($hotels, $this->get_hotel($row['hotel_code']));
		}
		return $hotels;
	}
}
