<?php

class Hotels_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
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
				'id' => 'id',
				'type' => 'type',
			);
			$this->data['location'] = array(
				'name' => 'location',
				'id' => 'location',
				'type' => 'text',
			);
			$this->data['hotel_submit'] = array(
				'name' => 'hotel_submit',
				'id' => 'hotel_submit',
				'value' => 'Submit',
			);
			$this->load->view('hotels/create_hotel', $this->data);
		} else {
		}
	}

	public function result() {
		echo 'Success but do nothing';
	}
}