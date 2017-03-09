<?php 

	// Procedure Way
	$connection = mysqli_connect("localhost","root","","test");
	if(mysqli_connect_errno()){
		die ("no connection".mysqli_error());
	}

	// Object Oriented
	class Database{
		public $connection;

		function __construct(){
			$this->open_db();
		}
		function open_db(){
			$this->connection = new mysqli("localhost","root","","test");
			if($this->connection->connect_errno){
				die("Database connection failed".$this->connection->error); //or mysqli_error()
			}
		}
		

		// close connection
		$this->connection->close(); // or mysqli_close($this->connection);

		$database = new Database();
	}

/*
mysqli_connect_errno : zero means no error occurred.
mysqli_error : return error message
*/ 

	// Query result 
	$sql = "SELECT * FROM test";
	$result = $database->query($sql);
	while($row = $result->fetch_array()){
		echo $row['name'];
	}
 ?>