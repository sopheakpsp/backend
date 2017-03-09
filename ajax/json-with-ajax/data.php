<?php 
	require_once("connect.php");

	$sql = "SELECT * FROM json_data";
	$result = $connect->query($sql) or die("No result".$connect->error);
	$array = array();
	while($row = $result->fetch_array()){
		$array[] = $row;
	}
	
	$connect->close();

	header("Content-Type: application/json");
	//$json = file_get_contents("data.json"); //read whole file into string
	$json = json_encode($array);
	echo $json;

 ?>