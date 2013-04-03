<?php

class Hotels_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Hotel_manager');
		$this->load->model('Hotel');
		$this->load->model('Hotel_feature');
		$this->load->model('Hotel_Feature_Manager');
		$this->load->model('Room');
		$this->load->model('Room_manager');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function create_hotel() {
		$this->form_validation->set_rules('hotel_code', 'Hotel Code', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');

		if ($this->form_validation->run() == false) {
			$this->data['hotel_code'] = array(
				'name' => 'hotel_code',
				'id' => 'hotel_code',
				'type' => 'text',
				);
			$this->data['name'] = array(
				'name' => 'name',
				'id' => 'name',
				'type' => 'text',
				);
			$this->data['location'] = array(
				'name' => 'location',
				'id' => 'location',
				'type' => 'text',
				);
			$this->data['hotel_submit'] = array(
				'name' => 'hotel_submit',
				'id' => 'hotel_submit',
				'class' => 'btn',
				'value' => 'Submit',
				);

			$this->load->model('Feature_manager');
			$this->data['features'] = $this->Feature_manager->get_all_features();
			
			$this->load->view('templates/admin/header.php');
			$this->load->view('hotels/create_hotel', $this->data);
		} else {
			$hotel_data = array('hotel_code' => $_POST['hotel_code'],
				'name' => $_POST['name'],
				'location' => $_POST['location']);

			$hotel = new Hotel($hotel_data);
			if (!$hotel->inTable()) {
				$hotel->save();

				if (isset($_POST['features'])) {
					$features = $_POST['features'];
					if (count($features) > 0) {
						foreach ($features as $feature_id) {
							$hotel_code = $hotel->hotel_code;
							$hotel_feature = new Hotel_feature(array('feature_id' => $feature_id, 
								'hotel_code' => $hotel_code));
							$hotel_feature->insert();
						}
					}
				}


				$rooms_code = $_POST['room_code'];
				$rooms_type = $_POST['room_type'];
				$rooms_comfort = $_POST['room_comfort'];
				$rooms_price = $_POST['room_price'];

				$n = count($rooms_code);
				for ($i = 0; $i < $n; $i++) {
					if ($rooms_code[$i] <> "") {
						$room_code = $rooms_code[$i];
						$hotel_code = $hotel->hotel_code;
						$type = $rooms_type[$i];
						$comfort_level = $rooms_comfort[$i];
						$price = intval($rooms_price[$i]);

						$room_data = array('room_code' => $room_code,
							'type' => $type,
							'comfort_level' => $comfort_level,
							'price' => $price,
							'hotel_code' => $hotel_code,
							'max_capacity' => 0);
						$room = new Room($room_data);
						$room->save();
					}
				}

				$this->load->view('templates/admin/header.php');
				$this->load->view('hotels/create_hotel_result', $hotel_data);
			}
		}
	}

	public function update_hotel($hotel_code) {
		// $this->form_validation->set_rules('hotel_code', 'Hotel Code', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');

		$hotel = $this->Hotel_manager->get_hotel($hotel_code);

		if ($this->form_validation->run() == false) {
			$this->data['hotel_code'] = array(
				'name' => 'hotel_code',
				'id' => 'hotel_code',
				'type' => 'text',
				'value' => $hotel->hotel_code,
				'readonly' => 'readonly',
				);
			$this->data['name'] = array(
				'name' => 'name',
				'id' => 'name',
				'type' => 'text',
				'value' => $hotel->name,
				);
			$this->data['location'] = array(
				'name' => 'location',
				'id' => 'location',
				'type' => 'text',
				'value' => $hotel->location,
				);
			$this->data['hotel_submit'] = array(
				'name' => 'hotel_submit',
				'id' => 'hotel_submit',
				'class' => 'btn',
				'value' => 'Submit',
				);

			$this->load->model('Feature_manager');
			$this->data['features'] = $this->Feature_manager->get_all_features();

			$hotel_features = $this->Hotel_Feature_Manager->get_features($hotel_code);
			for ($i = 0; $i < count($this->data['features']); $i++) {
				$this->data['checkbox'][$i] = FALSE;
				foreach ($hotel_features as $row) {
					if ($this->data['features'][$i]->id === $row->id) {
						$this->data['checkbox'][$i] = TRUE;
					}
				}
			}

			$rooms = $this->Room_manager->get_room(NULL, $hotel_code);
			$rooms_code = array();
			$rooms_type = array();
			$rooms_comfort = array();
			$rooms_price = array();
			if ($rooms <> NULL) {
				foreach ($rooms as $row) {
					array_push($rooms_code, $row->room_code);
					array_push($rooms_type, $row->type);
					array_push($rooms_comfort, $row->comfort_level);
					array_push($rooms_price, $row->price);
				}
			}
			$this->data['rooms_code'] = $rooms_code;
			$this->data['rooms_type'] = $rooms_type;
			$this->data['rooms_comfort'] = $rooms_comfort;
			$this->data['rooms_price'] = $rooms_price;
			
			$this->load->view('templates/admin/header.php');
			$this->load->view('hotels/update_hotel', $this->data);
		} else {
			$hotel_data = array('hotel_code' => $_POST['hotel_code'],
				'name' => $_POST['name'],
				'location' => $_POST['location']);

			$hotel = new Hotel($hotel_data);
			if ($hotel->inTable()) {
				$this->Hotel_Feature_Manager->remove_features($hotel->hotel_code);

				$features = $_POST['features'];
				// echo count($features);
				$hotel->save();
				foreach ($features as $feature_id) {
					$hotel_code = $hotel->hotel_code;
					$hotel_feature = new Hotel_feature(array('feature_id' => $feature_id, 
						'hotel_code' => $hotel_code));
					$hotel_feature->insert();
				}


				$this->Room_manager->delete_room(NULL, $hotel->hotel_code);

				$rooms_code = $_POST['room_code'];
				$rooms_type = $_POST['room_type'];
				$rooms_comfort = $_POST['room_comfort'];
				$rooms_price = $_POST['room_price'];

				$n = count($rooms_code);
				for ($i = 0; $i < $n; $i++) {
					if ($rooms_code[$i] <> "") {
						$room_code = $rooms_code[$i];
						$hotel_code = $hotel->hotel_code;
						$type = $rooms_type[$i];
						$comfort_level = $rooms_comfort[$i];
						$price = intval($rooms_price[$i]);

						$room_data = array('room_code' => $room_code,
							'type' => $type,
							'comfort_level' => $comfort_level,
							'price' => $price,
							'hotel_code' => $hotel_code,
							'max_capacity' => 0);
						$room = new Room($room_data);
						$room->save();
					}
				}

				$this->load->view('templates/admin/header.php');
				$this->load->view('hotels/update_hotel_result', $hotel_data);
			}
		}	
	}

	public function delete_hotel($hotel_code) {
		$hotel = $this->Hotel_manager->get_hotel($hotel_code);
		$hotel->delete();

		$this->data['hotel'] = $hotel;
		if ($hotel != NULL) {
			$this->load->view('templates/admin/header.php');
			$this->load->view('hotels/delete_hotel_result', $this->data);
		}
	}

	public function get_all_hotel_details($hotel_code) {
		$this->data = $this->Hotel_manager->get_all_hotel_details($hotel_code);

		$this->load->view('templates/admin/header.php');
		$this->load->view('pages/select', $this->data);
	}

	public function list_hotel() {

		$this->load->model('Hotel_manager');
		$this->data['hotels'] = $this->Hotel_manager->get_all_hotels();

		$this->load->view('templates/admin/header.php');
		$this->load->view('hotels/hotel_list', $this->data);

	}

	public function _result() {

	}
}
