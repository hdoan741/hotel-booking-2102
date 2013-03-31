<?php

class Hotels_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Hotel_manager');
		$this->load->model('Hotel');
		$this->load->model('Hotel_feature');
		$this->load->model('Hotel_Feature_Manager');
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

				$features = $_POST['features'];
				// echo count($features);
				$hotel->save();
				foreach ($features as $feature_id) {
					$hotel_code = $hotel->hotel_code;
					$hotel_feature = new Hotel_feature(array('feature_id' => $feature_id, 
						'hotel_code' => $hotel_code));
					$hotel_feature->insert();
				}

				$this->load->view('templates/admin/header.php');
				$this->load->view('hotels/create_hotel_result', $hotel_data);
			}
		}
	}

	public function update_hotel($hotel_code) {
		$this->form_validation->set_rules('hotel_code', 'Hotel Code', 'required');
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

	public function list_hotel() {

		$this->load->model('Hotel_manager');
		$this->data['hotels'] = $this->Hotel_manager->get_all_hotels();

		$this->load->view('templates/admin/header.php');
		$this->load->view('hotels/hotel_list', $this->data);

	}

	public function _result() {

	}
}
