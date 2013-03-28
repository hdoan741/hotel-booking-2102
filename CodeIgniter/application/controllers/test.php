<?php

class Test extends CI_Controller {
	
	public function view($page = 'home') {
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->database();
		$this->load->model('User_manager');
		$this->load->model('Feature_manager');
		$this->load->model('Hotel_Feature');
		
		$feature = new Feature(array('name'=>'b', 'description'=>'bbb'));
		$feature->save();
	}
}
