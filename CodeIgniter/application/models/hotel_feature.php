<?php

class Hotel_Feature extends CI_Model {
	var $feature_id = NULL;
	var $hotel_code = NULL;

	function __construct($attr=NULL) {
		parent::__construct();
		if($attr == NULL) return;
		$this->feature_id = $attr['feature_id'];
		$this->hotel_code = $attr['hotel_code'];
	}

	function insert() {
		$sql = 'INSERT INTO features 
			(feature_id, hotel_code) VALUES (\''
			. $this->feature_id  . '\', \''
			. $this->hotel_code . '\')';
		$this->db->query($sql);
	}
}

?>
