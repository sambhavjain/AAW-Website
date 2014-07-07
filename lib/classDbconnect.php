<?php

class DbConnect{

	private $db;
	private $host;
	private $user;
	private $password;
	private $dbname;
	private $dbDSN;

	public function __construct(){
		$this->db="mysql";
		$this->host="localhost";
		$this->user="root";
		$this->password="root";
		$this->dbname='test';
		
		$this->dbDSN="$this->db:host=$this->host;dbname=$this->dbname";

	}

    public function connect(){

			try {
				
				$objPDO = new PDO($this->dbDSN, $this->user, $this->password, array(PDO::ATTR_PERSISTENT => true));
		        return $objPDO;
				
			} catch (PDOException $e) {
				$e->getMessage();
			}
	}

}


?>