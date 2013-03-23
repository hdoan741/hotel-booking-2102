<?php

class Usermanager extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_user($user_id) {
		$sql = 'SELECT * FROM users WHERE user_id=' . $user_id;
		$query = $this->db->query($sql);
		$row = $query->row_array();
		include APPPATH . 'models/user.php';
		return new User($row);
	}
/*
	function get_all_users() {
		$sql = 'SELECT * ';
	}
*/
}

?>
