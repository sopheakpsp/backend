<?php 
	$connect = new mysqli("localhost","root","","maps");
	if($connect->connect_errno){
		die($connect->error);
	}

	
	print_r($_POST);
	

 ?>