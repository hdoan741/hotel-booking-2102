<?php

class Pages extends CI_Controller {
	
	public function view($page = 'home') {
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->database();
		$this->load->model('Usermanager');
		$this->load->model('Featuremanager');

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['user'] = $this->Usermanager->get_user(1)->first_name;
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
		$user = $this->Usermanager->new_user($attr);
		$user->save();
		$feature = $this->Featuremanager->new_feature($attr);
		$feature->save();
*/
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}
