<?php	
	include("phpfunctions/connection.php");
	$select = "SELECT c_id FROM customer WHERE active = '1' AND duration='6'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "អតិថិជន";
	$content_title = "អតិថិជន​សរុបមាន ".$num_rows;
	$page = "customer_6";
	include ("main/layout.php");
?>
	
	
