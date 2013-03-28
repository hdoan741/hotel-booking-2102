<?php

class Pages extends CI_Controller {
	
	public function view($page = 'home') {
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->database();
		$this->load->model('User_manager');
		$this->load->model('Feature_manager');
		$this->load->model('Hotel_Feature_Manager');

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['user'] = $this->User_manager->get_user(1)->first_name;
/*		$attr = array(
			'first_name' => 'a',
			'last_name' => 'a',
			'address' => 'a',
			'password' => 'a',
			'email' => 'a',
			'card_no' => 'a',
			'phone' => 'a',
			'user_type' => 1,
			'name' => 'a',
			'description' => 'a',
		);
		$user = $this->User_manager->new_user($attr);
		$user->save();
		$feature = $this->Feature_manager->new_feature($attr);
		$feature->save();
*/

	//	$feature = $this->Hotel_Feature_Manager->get_features(1);
	//	echo $feature[0]->name;
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}
