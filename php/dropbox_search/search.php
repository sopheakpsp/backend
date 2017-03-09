<?php 
require_once("../_configuration/init.php");

if(isset($_POST['search_id'])){
	$search_id = $database->escape_string($_POST['search_id']);

	if(!empty($search_id)){
		$sql = "SELECT * FROM district WHERE ref_id = '$search_id'";
		$districts = District::find_this_query($sql);
		foreach($districts as $district){
			// echo $district->id;
			// echo $district->district_name;
			echo "<option value='{$district->id}'>{$district->district_name}</option>";
		}
	}
	
 }

?>