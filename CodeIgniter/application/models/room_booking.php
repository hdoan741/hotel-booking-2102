<?php
class Room_booking extends CIModel {
	var $room_code = '';
	var $hotel_code = '';
	var $booking_id = 0;

	function __construct($data=NULL) {
		parent::__construct();

		if ($data != NULL) {
			if (is_array($data)) {
				$this->room_code = $data['room_code'];
				$this->hotel_code = $data['hotel_code'];
				$this->booking_id = $data['booking_id'];
			} else {
				$this->room_code = $data->room_code;
				$this->hotel_code = $data->hotel_code;
				$this->booking_id = $data->booking_id;
			}
		}
	}

	function _insert() {
		$format = 'INSERT INTO room_booking (room_code, hotel_code, booking_id) VALUES (\'%s\', \'%s\', %d)';
		$sql = sprintf($format, $this->room_code, $this->hotel_code, $this->booking_id);
		$query = $this->db->query($sql);
	}

	function _update() {
	}

	function _inTable() {
		$format = 'SELECT * FROM room_booking WHERE room_code = \'%s\' AND hotel_code = \'%s\' AND booking_id = %d';
		$sql = sprintf($format, $this->room_code, $this->hotel_code, $this->booking_id);
		$query = $this->db->query($sql);

		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function save() {
		if ($this->_inTable()) {
			$this->_update();
		} else {
			$this->_insert();
		}
	}
}