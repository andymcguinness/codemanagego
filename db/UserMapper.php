<?php
require_once('../models/user.class.php');

class UserMapper {
	
	function __construct() {
		$this->databaseConnect();

	}
	
	function retrieveUsers() {
		
		$conn = $this->databaseConnect();
		
		//getting results
		$result = $conn->query('SELECT * FROM user;');
		
		//converting to objects
		$result->setFetchMode(PDO::FETCH_CLASS, 'User');
		$users = $result->fetchAll();
		
		return $users;
	}

	protected function databaseConnect() {
		$conn = new PDO('mysql:host=ispace-2013.cci.fsu.edu;dbname=mm09k_lis4368', 'mm09k', 'd2mwr0p1');
		return $conn;
	}
}


?>