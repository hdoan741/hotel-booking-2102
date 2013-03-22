<?php

Class Usermanager extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_user($user_id) {
		$sql = 'SELECT * FROM users WHERE user_id=' . $user_id;
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return new User($row);
	}
}

?>
