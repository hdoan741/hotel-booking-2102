<?php

Class User extends CI_Model {
	var $name = '';
	var $address = '';
	var $user_id = NULL;
	var $password = '';
	var $email = '';
	var $card_number = '';
	var $passport = '';
	var $phone_no = '';
	var user_type = NULL;	

	function __construct() {
		parent::__construct();
	}

	function __construct($attr) {
		parent::__construct();
		$name = $attr['name'];
		$address = $attr['address'];
		$user_id = $attr['user_id'];
		$password = $attr['password'];
		$email = $attr['email'];
		$card_number = $attr['card_number'];
		$passport = $attr['passport'];
		$phone_no = $attr['phone_no'];
		$user_type = $attr['user_type'];
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
