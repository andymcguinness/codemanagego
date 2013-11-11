<?php
require_once('../models/task.class.php');

class TaskMapper {
	
	function __construct() {
		$this->databaseConnect();

	}
	
	function retrieveTasks() {
		
		$conn = $this->databaseConnect();
		
		//getting results
		$result = $conn->query('SELECT * FROM task;');
		
		//converting to objects
		$result->setFetchMode(PDO::FETCH_CLASS, 'Task');
		$tasks = $result->fetchAll();
		
		return $tasks;
	}

	protected function databaseConnect() {
		$conn = new PDO('mysql:host=ispace-2013.cci.fsu.edu;dbname=mm09k_lis4368', 'mm09k', 'd2mwr0p1');
		return $conn;
	}
}


?>