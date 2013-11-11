<?php
require_once('../models/file.class.php');

class FileMapper {
	
	function __construct() {
		$this->databaseConnect();

	}
	
	function retrieveFiles() {
		
		$conn = $this->databaseConnect();
		
		//getting results
		$result = $conn->query('SELECT * FROM file;');
		
		//converting to objects
		$result->setFetchMode(PDO::FETCH_CLASS, 'File');
		$files = $result->fetchAll();
		
		return $files;
	}

	protected function databaseConnect() {
		$conn = new PDO('mysql:host=ispace-2013.cci.fsu.edu;dbname=mm09k_lis4368', 'mm09k', 'd2mwr0p1');
		return $conn;
	}
}


?>