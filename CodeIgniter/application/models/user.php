<?php

Class User extends CI_Model {
	var $name = '';
	var $address = '';
	var $id = NULL;
	var $password = '';
	var $email = '';
	var $card_no = '';
	var $passport = '';
	var $phone = '';
	var $user_type = NULL;	

	function __construct($attr) {
		parent::__construct();
		if($attr == NULL) return;
		$this->name = $attr['name'];
		$this->address = $attr['address'];
		$this->id = $attr['id'];
		$this->password = $attr['password'];
		$this->email = $attr['email'];
		$this->card_number = $attr['card_no'];
		$this->passport = $attr['passport'];
		$this->phone_no = $attr['phone'];
		$this->user_type = $attr['user_type'];
	}

	function save() {
		if($id == NULL) {
			$sql = 'INSERT INTO users VALUES ('
				. $name  . ', '
				. $address . ', '
				. $id . ', '
				. $password . ', '
				. $email . ', '
				. $card_no . ', '
				. $passport . ', '
				. $phone . ', '
				. $user_type . ')';
		} else {
			$sql = 'UPDATE users SET '
				. 'name=' . $name . ', '
				. 'address=' . $address . ', '
				. 'password=' . $password . ', '
				. 'email=' . $email . ', '
				. 'card_no=' . $card_number . ', '
				. 'passport=' . $passpost . ', '
				. 'phone' . $phone_no . ', '
				. 'user_type' . $user_type . ' '
				. 'WHERE id=' . $id;
		}
		$this->db->query($sql);
	}
}

?>
