<?php
	include("phpfunctions/connection.php");
	$select = "SELECT s_id FROM staff WHERE active = '1'";
	$sql = mysqli_query($connection,$select) or die(mysql_error());
    $num_rows = mysqli_num_rows($sql);
		
	$title = "បុគ្គលិក";
	$content_title = "បុគ្គលិក (".$num_rows."នាក់)";
	$page = "staff";
	include ("main/layout.php");
?>
	
	
