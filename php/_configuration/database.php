<?php 
require_once("config.php");

class Database{
	public $connection;

	function __construct(){
		$this->open_db_connection();
	}

	public function open_db_connection(){
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if ($this->connection->connect_errno) {
			die("Network problem cannot connect to database").mysqli_error();
		}
	}

	public function escape_string($data){
		return mysqli_real_escape_string($this->connection, htmlentities($data));
	}

	public function query($sql){
		return mysqli_query($this->connection, $sql);
	}
 }

$database = new Database();

 ?>
