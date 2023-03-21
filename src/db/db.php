<?php 

/**
 * 
 */
class DB
{
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "JBP";

	function __construct()
	{

		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		$sql = "CREATE TABLE IF NOT EXISTS users
		(
		    id int AUTO_INCREMENT PRIMARY KEY,
		    firstname varchar(30) NOT NULL,
		    lastname varchar(30) NOT NULL,
		    email varchar(100) NOT NULL,
		    password varchar(30) NOT NULL,
		    img varchar(100) NOT NULL,
		    createdData timestamp NOT NULL
		);";

		$this->conn->query($sql);

		// Check connection
		if ($this->conn->connect_error) 
		{
			die("Connection failed: " . $conn->connect_error);
		} 

	}

}
