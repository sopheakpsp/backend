<?php	
	include("phpfunctions/connection.php");
	$select = "SELECT c_id FROM customer WHERE active = '1'";
	$sql = mysqli_query($connection, $select) or die(mysql_error());

    $num_rows = mysqli_num_rows($sql);
		
	$title = "អតិថិជន";
	$content_title = "អតិថិជន​សរុបមាន ".$num_rows;
	$page = "customer";
	include ("main/layout.php");
?>
	
	
