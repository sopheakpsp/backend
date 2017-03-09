<?php require_once("_configuration/init.php"); ?>
<?php 
	$sql = "SELECT COUNT(*) FROM date_select WHERE date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY";
	$result = $database->query($sql);
	$row = mysqli_fetch_array($result);
	echo array_shift($row);
 ?>