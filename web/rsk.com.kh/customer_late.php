<?php	
	include("phpfunctions/connection.php");
	$select = "SELECT c_id FROM customer WHERE active = '1' AND pay_status = 'ជំពាក់'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "អតិថិជនមិនទាន់បង់";
	$content_title = "អតិថិជនមិនទាន់បង់​សរុប ".$num_rows;
	$page = "customer_late";
	include ("main/layout.php");
?>
	
	
