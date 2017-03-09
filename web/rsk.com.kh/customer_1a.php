<?php	
	include("phpfunctions/connection.php");
	$select = "SELECT c_id FROM customer WHERE active = '1' AND duration='12'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "អតិថិជន១ឆ្នាំ";
	$content_title = "អតិថិជន១ឆ្នាំមាន ".$num_rows;
	$page = "customer_1a";
	include ("main/layout.php");
?>
	
	
