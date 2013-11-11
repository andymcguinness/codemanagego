<?php
include_once('../models/user.class.php');

class UserMapper {
	
	function __construct() {
		$this->databaseConnect();

	}
	
	function createUser($userObj) {
		
		//connecting to the database
		$conn = $this->databaseConnect();
		
		$stmt = $conn->prepare('INSERT INTO user (usr_id, usr_username, usr_lastname, usr_firstname, usr_email, usr_password, usr_isManager) VALUES (:id, :uname, :lname, :fname, :email, :pword, :isMan)');
		$stmt->bindParam(':id', $userObj->__get(usr_id));
		$stmt->bindParam(':uname', $userObj->__get(usr_username));
		$stmt->bindParam(':lname', $userObj->__get(usr_lastname));
		$stmt->bindParam(':fname', $userObj->__get(usr_firstname));
		$stmt->bindParam(':email', $userObj->__get(usr_email));
		$stmt->bindParam(':pword', $userObj->__get(usr_password));
		$stmt->bindParam(':isMan', $userObj->__get(usr_isManager));
		
		$result = $stmt->execute();
		
		return $result;
	}
	
	function retrieveUsers() {
		
		//connecting to the database
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