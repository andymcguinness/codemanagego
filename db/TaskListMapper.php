<?php
require_once('../models/tasklist.class.php');

class TaskListMapper {
	
	function __construct() {
		$this->databaseConnect();

	}
	
	function retrieveLists() {
		
		$conn = $this->databaseConnect();
		
		//getting results
		$result = $conn->query('SELECT * FROM list;');
		
		//converting to objects
		$result->setFetchMode(PDO::FETCH_CLASS, 'TaskList');
		$lists = $result->fetchAll();
		
		return $lists;
	}

	protected function databaseConnect() {
		$conn = new PDO('mysql:host=ispace-2013.cci.fsu.edu;dbname=mm09k_lis4368', 'mm09k', 'd2mwr0p1');
		return $conn;
	}
}


?>