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

		$data['title'] = ucfirst($page); // Capitalize the first letter
    $current_user = $this->ion_auth->user()->row();
    $data['current_user'] = $current_user;

    $this->load->view('templates/header', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer', $data);
	}
}
