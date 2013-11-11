<?php
require_once('../models/project.class.php');

class ProjectMapper {
	
	function __construct() {
		$this->databaseConnect();

	}
	
	function retrieveProjects() {
		
		$conn = $this->databaseConnect();
		
		//getting results
		$result = $conn->query('SELECT * FROM project;');
		
		//converting to objects
		$result->setFetchMode(PDO::FETCH_CLASS, 'Project');
		$projects = $result->fetchAll();
		
		return $projects;
	}

	protected function databaseConnect() {
		$conn = new PDO('mysql:host=ispace-2013.cci.fsu.edu;dbname=mm09k_lis4368', 'mm09k', 'd2mwr0p1');
		return $conn;
	}
}


?>