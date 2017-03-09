<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Database Connection Ways</title>
</head>
<body>
<h3>PHP old version</h3>
<?php
 /* 
	$con = mysql_connect("localhost","root","");
	mysql_select_db("test", $con) or die(mysql_error());

	$result = mysql_query("SELECT * FROM test", $con);
	if(!$result){
		die (mysql_error());
	}else{
		while($row = mysql_fetch_array($result)){
			echo $row['name'];
		}
	}
*/
 ?>

<h3>PHP New Version</h3>

<h3>Object Oriented</h3>
<?php 
/* 
	$con = new mysqli("localhost", "root", "", "test");
	if($con->connect_errno){
		die ("cannot connect to server").mysqli_error();
	}

	$sql = "SELECT * FROM test";
	$result = mysqli_query($con, $sql);
	if(!$result){
		die("no result").mysql_error();
	}else{
		while($row = mysqli_fetch_array($result)){
			
		}
	}
*/
 ?>
</body>
</html>