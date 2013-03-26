<?php

class User extends CI_Model {
	var $id = NULL;
	var $start_date = NULL;
	var $end_date = NULL;
	var $customer = '';
	var $num_child = 0;
	var $num_adult = 0;

	function __construct($attr=NULL) {
		parent::__construct();
		if($attr == NULL) return;
		$this->id = $attr['id'];
		$this->start_date = $attr['start_date'];
		$this->end_start = $attr['end_date'];
		$this->customer = $attr['customer'];
		$this->num_child = $attr['num_child'];
	}

	function save() {
                if($id == NULL) {
                        $sql = 'INSERT INTO bookings VALUES ('
                                . $start_date  . ', '
                                . $end_date . ', '
                                . $customer . ', '
                                . $num_child . ', '
                                . $num_adult . ')';
                } else {
                        $sql = 'UPDATE users SET '
                                . 'start_date=' . $start_date . ', '
                                . 'end_date=' . $end_date . ', '
                                . 'customer=' . $customer . ', '
                                . 'num_child=' . $num_child . ', '
                                . 'num_adult=' . $num_adult . ', '
                                . 'WHERE id=' . $id;
		}
		$this->db->query($sql);
	}
}
