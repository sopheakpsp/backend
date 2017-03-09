<?php 
$get = $_GET;
if(isset($get["offset"]) && isset($get["limit"])){
	$offset = $get["offset"];
	$limit = $get["limit"];
	
	$con = mysqli_connect("localhost","root","","mysample_db");
	$sql = "select * from post limit {$limit} offset {$offset}";
	$query = mysqli_query($con, $sql);

	while($row = mysqli_fetch_array($query)){
		echo'
			<h2>'.$row["post_id"].' '.$row["post_title"].'</h2>
			<p>'.$row["post_paragraph"].'</p>
			';
	}
}
	


 ?>