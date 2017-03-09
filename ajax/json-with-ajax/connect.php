<?php 
	$connect = new mysqli("localhost","root","","ajax_db");
	if($connect->connect_errno){
		die("Error connection".$connect->error);
	}


 ?>