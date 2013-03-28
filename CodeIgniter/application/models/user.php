<?php

class User extends CI_Model {
	var $first_name = '';
	var $last_name = '';
	var $address = '';
	var $id = NULL;
	var $password = '';
	var $email = '';
	var $card_no = '';
	var $passport = '';
	var $phone = '';
	var $user_type = NULL;	

	function __construct($attr=NULL) {
		parent::__construct();
		if($attr == NULL) return;
		$this->id = $attr['id'];
		$this->first_name = $attr['first_name'];
		$this->last_name = $attr['last_name'];
		$this->address = $attr['address'];
		$this->password = $attr['password'];
		$this->email = $attr['email'];
		$this->card_number = $attr['card_no'];
		$this->phone_no = $attr['phone'];
		$this->user_type = $attr['user_type'];
	}

	function save() {
		if($this->id == NULL) {
			$sql = 'INSERT INTO users 
				(first_name, last_name,
				 address, password,
				 email, card_no,
				 phone, user_type) VALUES (\''
				. $this->first_name  . '\', \''
				. $this->last_name . '\', \''
				. $this->address . '\', \''
				. $this->password . '\', \''
				. $this->email . '\', \''
				. $this->card_no . '\', \''
				. $this->phone_no . '\', '
				. $this->user_type . ')';
		} else {
			$sql = 'UPDATE users SET '
				. 'first_name=\'' . $this->first_name . '\', '
				. 'last_name=\'' . $this->last_name . '\', '
				. 'address=\'' . $this->address . '\', '
				. 'password=\'' . $this->password . '\', '
				. 'email=\'' . $this->email . '\', '
				. 'card_no=\'' . $this->card_number . '\', '
				. 'phone=\'' . $this->phone_no . '\', '
				. 'user_type=' . $this->user_type . ' '
				. 'WHERE id=' . $this->id;
		}
		$this->db->query($sql);
	}
}

?>
