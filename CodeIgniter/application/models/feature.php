<?php

class Feature extends CI_Model {
	var $id = NULL;
	var $name = '';
	var $description = '';

	function __construct($attr=NULL) {
		parent::__construct();
		if($attr == NULL) return;
		if(array_key_exists('id', $attr)) $this->id = $attr['id'];
		$this->name = $attr['name'];
		$this->description = $attr['description'];
	}

	function save() {
		if($this->id == NULL) {
			$sql = 'INSERT INTO features 
				(name, description) VALUES (\''
				. $this->name  . '\', \''
				. $this->description . '\')';
		} else {
			$sql = 'UPDATE features SET '
				. 'name=\'' . $this->name . '\', '
				. 'description=\'' . $this->description . '\', '
				. 'WHERE id=' . $this->id;
		}
		$this->db->query($sql);
	}

	function delete() {
		$sql = 'DELETE FROM features WHERE id = ' . $this->id;
		$this->db->query($sql);
	}
}

?>
