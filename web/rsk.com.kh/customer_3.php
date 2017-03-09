<?php	
	include("phpfunctions/connection.php");
	$select = "SELECT c_id FROM customer WHERE active = '1' AND duration='3'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "អតិថិជន៣ខែ";
	$content_title = "អតិថិជន​៣ខែមាន ".$num_rows;
	$page = "customer_3";
	include ("main/layout.php");
?>
	
	
