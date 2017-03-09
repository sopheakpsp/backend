<?php 
require_once("../_configuration/init.php");

if(isset($_POST['search_value'])){
	$search_value = $database->escape_string($_POST['search_value']);
	
	if(!empty($search_value)){
		$sql = "SELECT * FROM city WHERE city_name LIKE '%$search_value%'";
		$citys = City::find_this_query($sql);
		echo "The result has found ".count($citys)."<br>";	
		foreach($citys as $city){
			echo $city->city_name."<br>";
		}


	}
 }

?>