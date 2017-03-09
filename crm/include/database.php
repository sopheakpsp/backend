<?php 

require_once("config.php");

class Database{
	public $connection;

	function __construct(){
		$this->open_db_connection();
	}

	public function open_db_connection(){

		// * Improve connection and more object oriented style

		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
			if($this->connection->connect_errno){
				die("Network problem, cannot connect to database.").mysqli_error();
			}

			// * old connection style

			// $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			// 	if (mysqli_connect_errno()) {	
			// 		die("Network problem, cannot connect to database.").mysqli_error();
			//	}

	}

	public function query($sql){
		$result = mysqli_query($this->connection, $sql);
		return $result;
	}

	public function close_connection(){
		return mysqli_close($this->connection);
	}

	private function confirm_query($result){
		if (!$result) {
			die("Query false");
		}
	}

	public function escape_string($string){
		$escape_string = mysqli_real_escape_string($this->connection, $string);
		return $escape_string;
	}

	public function insert_id(){
		return mysqli_insert_id($this->connection);
	}

}

$database = new Database();

 ?>