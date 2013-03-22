<?php

Class User extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function insert($array) {
		$count = count($array);
		$sql = "INSERT INTO users VALUES (";
		for($i = 0; $i < $count; $i++) {
			if($i < $count - 1) $sql .= $array[$i] . ", ";
			else $sql .= $array[$i] . ")";
		}
		$this->db->query($sql);
	}

	function get_first_entry() {
		$sql = "SELECT name FROM users LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row['name'] || '';
	}
}

?>
