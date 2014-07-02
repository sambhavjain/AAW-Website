<?php

class DbConnect{

	private $db;
	private $host;
	private $user;
	private $password;
	private $dbname;
	private $dbDSN;

	public function __construct(){
		$db="mysql";
		$host="localhost";
		$user="aawprod_admin";
		$password="admin";
		$dbname='aawprod_test';
		
		$dbDSN="$db:dbname=$dbname;host=$host;user=$user;password=$password;";
	}

	public function connect(){

		$objPDO = new PDO($dbDSN, NULL, NULL, array(PDO::ATTR_PERSISTENT => true));
		return $objPDO; 
	}

}