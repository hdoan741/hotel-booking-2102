<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_Controller extends CI_Controller {

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
		$this->form_validation->set_rules('location', 'Location', 'required');
	
		if($this->form_validation->run() == false) {
			$this->data['location'] = array(
				'name' => 'location',
				'id' => 'location',
				'type' => 'text',
				'placeholder' => 'please specify location',
				'value' => $this->form_validation->set_value('location'),
			);
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
			$this->data['room_type_options'] = array(
				'double' => 'Double',
				'twin' => 'Twin',
				'single' => 'Single',
			);
			$this->data['num_room_options'] = array(
				'1' => 1,
				'2' => 2,
				'3' => 3,
				'4' => 4,
				'5' => 5,
			);
			$this->data['booking_submit'] = array(
				'name' => 'booking_submit',
				'id' => 'booking_submit',
				'value' => 'Search',
			);
			$this->load->view('booking/create_booking', $this->data);
		} else {
			redirect('booking/hotel_list', 'refresh');
/*			$this->load->model('Bookingmanager');
			$attr = array(
				'start_date' => $this->input->post('start_date'),
				'end_date' => $this->input->post('end_date'),
				'customer' => 'aaa',
				'num_child' => (int)$this->input->post('num_child'),
				'num_adult' => (int)$this->input->post('num_adult'),
			);
			echo serialize($attr);
			$booking = $this->Bookingmanager->new_booking($attr);
			$booking->save();
*/		}	
	}

	function hotel_list() {
		$this->load->view('booking/hotel_list');
	}
}	
