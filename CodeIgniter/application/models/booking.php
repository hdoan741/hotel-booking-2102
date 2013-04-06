<?php

class Booking extends CI_Model {
	var $id = NULL;
	var $start_date = NULL;
	var $end_date = NULL;
	var $customer = '';
	var $num_child = 0;
	var $num_adult = 0;

	function __construct($attr=NULL) {
		parent::__construct();
		if($attr == NULL) return;
		if(array_key_exists('id', $attr)) $this->id = $attr['id'];
		$this->start_date = $attr['start_date'];
		$this->end_date = $attr['end_date'];
		$this->customer = $attr['customer'];
		$this->num_child = $attr['num_child'];
		$this->num_adult = $attr['num_adult'];
	}

	function save() {
                if($this->id == NULL) {
                        $sql = 'INSERT INTO bookings VALUES (NULL, \''
                                . $this->start_date . '\', \''
                                . $this->end_date . '\', \''
                                . $this->customer . '\', '
                                . $this->num_child . ', '
                                . $this->num_adult . ')';
			echo $sql;
                } else {
                        $sql = 'UPDATE users SET '
                                . 'start_date=\'' . $this->start_date . '\', '
                                . 'end_date=\'' . $this->end_date . '\', '
                                . 'customer=\'' . $this->customer . '\', '
                                . 'num_child=' . $this->num_child . ', '
                                . 'num_adult=' . $this->num_adult . ', '
                                . 'WHERE id=' . $this->id;
		}
		$this->db->query($sql);
		$this->id = $this->db->query("SELECT MAX(id) AS id  FROM bookings")->row()->id;
		echo $this->id.'AAAAA';
	}

	function delete() {
		$sql = 'DELETE FROM bookings WHERE id='.$this->id;
		$this->db->query($sql);
	}
}
