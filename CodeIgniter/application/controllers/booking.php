<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	function create_booking() {
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');		
		$this->form_validation->set_rules('end_date', 'End Date', 'required');
	
		if($this->form_validation->run() == false) {
			$this->data['start_date'] = array(
				'name' => 'start_date',
				'id' => 'start_date',
				'type' => 'text',
				'placeholder' => 'click to choose date',
				'value' => $this->form_validation->set_value('start_date'),
			);
			$this->data['end_date'] = array(
				'name' => 'end_date',
				'id' => 'end_date',
				'type' => 'text',
				'placeholder' => 'click to choose date',
				'value' => $this->form_validation->set_value('end_date'),
			);
			$this->data['num_child'] = array(
				'name' => 'num_child',
				'id' => 'num_child',
				'type' => 'text',
			);
			$this->data['num_adult'] = array(
				'name' => 'num_adult',
				'id' => 'num_adult',
				'type' => 'text',
			);
			$this->data['booking_submit'] = array(
				'name' => 'booking_submit',
				'id' => 'booking_submit',
				'value' => 'Search',
			);
			$this->load->view('booking/create_booking', $this->data);
		} else {
			redirect('booking/hotel_list', 'refresh');
		}	
	}

	function hotel_list() {
		echo "Hotel listing";
	}
}	
