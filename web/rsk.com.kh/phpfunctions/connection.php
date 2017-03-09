<?php

	define('HOSTNAME', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'rsk');
	
	$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	mysqli_query($connection,"SET character_set_results=utf8");
	mb_language('uni'); 
	mb_internal_encoding('UTF-8');
	mysqli_select_db($connection, DATABASE);
	mysqli_query($connection, "set names 'utf8'");

?>