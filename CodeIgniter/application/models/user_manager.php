<?php

class User_Manager extends CI_Model {

	function __construct() {
		parent::__construct();
		include APPPATH . 'models/user.php';
	}

	function new_user($attr) {
		return new User($attr);
	}

	function get_user($id) {
		$sql = 'SELECT * FROM users WHERE id=' . $id;
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return new User($row);
	}

	function get_all_users() {
		$sql = 'SELECT * FROM users';
		$query = $this->db->query($sql);
		$users = array();
		
		foreach($query->result_array() as $row) {
			array_push($users, new User($row));
		}
		return users;
	}
}

?>
