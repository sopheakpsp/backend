<?php	
	include("phpfunctions/connection.php");
	$select = "SELECT c_id FROM customer WHERE active = '1' AND duration='1'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "អតិថិជន១ខែ";
	$content_title = "អតិថិជន១ខែមាន ".$num_rows;
	$page = "customer_1";
	include ("main/layout.php");
?>
	
	
