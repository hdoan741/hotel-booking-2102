<?php

class Featuremanager extends CI_Model {

	function __construct() {
		parent::__construct();
		include APPPATH . 'models/feature.php';
	}

	function new_feature($attr) {
		return new Feature($attr);
	}

	function get_feature($id) {
		$sql = 'SELECT * FROM features WHERE id=' . $id;
		$query = $this->db->query($sql);
		$row = $query->row_array();
		include APPPATH . 'models/feature.php';
		return new Feature($row);
	}

	function get_all_features() {
		$sql = 'SELECT * FROM features';
		$query = $this->db->query($sql);
		$features = array();		
		
		include APPPATH . 'models/feature.php';
		foreach($query->result() as $row) {
			array_push($features, new Feature($row));
		}
		return features;
	}
}

?>
