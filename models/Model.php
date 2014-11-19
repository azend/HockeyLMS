<?php
class Model {
	protected $db;

	public __construct() {
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);	
	}

	public __destruct() {
		$db = null;
	}
}
