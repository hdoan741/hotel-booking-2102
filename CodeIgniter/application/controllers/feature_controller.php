<?php

class Feature_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Feature_manager');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function create_feature() {
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() == false) {
			$this->data['name'] = array(
				'name' => 'name',
				'id' => 'name',
				'type' => 'text'
			);
			$this->data['description'] = array(
				'name' => 'description',
				'id' => 'description',
			);
			$this->data['feature_submit'] = array(
				'name' => 'feature_submit',
				'id' => 'feature_submit',
				'class' => 'btn',
				'value' => 'Submit'
			);
			$this->load->view('templates/admin/header.php');
			$this->load->view('features/create_feature', $this->data);
		} else {
			$this->_result();
		}
	}

	public function list_features() {

		$this->load->model('Feature_manager');
		$this->data['features'] = $this->Feature_manager->get_all_features();
		$this->load->view('templates/admin/header.php');
		$this->load->view('features/feature_list', $this->data);

	}

	public function update_feature($feature_id) {
	
	}

	public function delete_feature($feature_id) {
		$feature = $this->Feature_manager->get_feature($feature_id);
		$feature->delete();

		$this->data['feature'] = $feature;
		if ($feature != NULL) {
			$this->load->view('templates/admin/header.php');
			$this->load->view('features/delete_feature_result', $this->data);
		}
	}

	public function _result() {
		$feature_data = array('name' => $_POST['name'],
							'description' => $_POST['description']);

		$hotel = new Feature($feature_data);
		$hotel->save();

		$this->load->view('templates/admin/header.php');
		$this->load->view('features/create_feature_result', $feature_data);
	}

}
