<?php

class Hotels_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Hotel_manager');
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
			$this->_result();
		}
	}

	public function list_hotel() {

		$this->load->model('Hotel_manager');
		$this->data['hotels'] = $this->Hotel_manager->get_all_hotels();

		$this->load->view('templates/admin/header.php');
		$this->load->view('hotels/hotel_list', $this->data);

	}

	public function _result() {
		$hotel_data = array('hotel_code' => $_POST['hotel_code'],
							'name' => $_POST['name'],
							'location' => $_POST['location']);

		include APPPATH .'models/hotel.php';
		$hotel = new Hotel($hotel_data);
		$hotel->save();

		$this->load->view('templates/admin/header.php');
		$this->load->view('hotels/create_hotel_result', $hotel_data);
	}
}
