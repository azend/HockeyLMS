<?php
class Model {
	protected $db = null;

	function __construct() {
		$this->db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);	
	}

	function __destruct() {
		$this->db = null;
	}
}
