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
		}	
	}

	function booking_list() {
		$this->load->model('Booking_manager');
		$this->data['bookings'] = $this->Booking_manager->get_all_bookings();
		$this->load->view('templates/admin/header.php');
		$this->load->view('booking/booking_list', $this->data);
	}

	function payment($hotel_code) {
		$this->load->model('Room_manager');
		$start_date = $this->session->userdata('start_date');
		$end_date = $this->session->userdata('end_date');
		$rooms = $this->Room_manager->get_available_rooms_all_groups($hotel_code, $start_date, $end_date);
		$this->bookings = array();
		$total = 0;
		$amount = $_POST['amount'];
		echo serialize($amount);
		for($i=0; $i<count($rooms); $i++) {
			$data = array(
				'start_date' => $start_date,
				'end_date' => $end_date,
				'room' => $rooms[$i],
				'amount' => $amount[$i],
			);
			array_push($this->bookings, $data);
			$total += $rooms[$i]['price'] * $data['amount'];
		}
		$this->load->view('templates/header.php');
		$this->load->view('pages/payment', array('total'=>$total));
		$this->load->view('templates/footer.php');
	}
}	
