<?php

Class User extends CI_Model {
	var $name = '';
	var $address = '';
	var $id = NULL;
	var $password = '';
	var $email = '';
	var $card_number = '';
	var $passport = '';
	var $phone_no = '';
	var $user_type = NULL;	

	function __construct($attr) {
		parent::__construct();
		if($attr == NULL) return;
		$this->name = $attr['name'];
		$this->address = $attr['address'];
		$this->id = $attr['id'];
		$this->password = $attr['password'];
		$this->email = $attr['email'];
		$this->card_number = $attr['card_number'];
		$this->passport = $attr['passport'];
		$this->phone_no = $attr['phone_no'];
		$this->user_type = $attr['user_type'];
	}

	function save() {
		if($user_id == NULL) {
			$sql = 'INSERT INTO users VALUES ('
				. $name  . ', '
				. $address . ', '
				. $user_id . ', '
				. $password . ', '
				. $email . ', '
				. $card_number . ', '
				. $passport . ', '
				. $phone_no . ', '
				. $user_type . ')';
		} else {
			$sql = 'UPDATE users SET '
				. 'name=' . $name . ', '
				. 'address=' . $address . ', '
				. 'password=' . $password . ', '
				. 'email=' . $email . ', '
				. 'card_number=' . $card_number . ', '
				. 'passport=' . $passpost . ', '
				. 'phone_no' . $phone_no . ', '
				. 'user_type' . $user_type . ' '
				. 'WHERE user_id=' . $user_id;
		}
		$this->db->query($sql);
	}
}

?>
