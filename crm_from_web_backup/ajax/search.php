<?php 
require_once("../include/init.php");

if(isset($_POST['city_id'])){
// echo "<script type='text/javascript'>alert('ok');</script>";
 $city_id = $database->escape_string($_POST['city_id']);
 
 if(!empty($city_id)){
 	$sql = "SELECT * FROM district WHERE ref_id = '$city_id'";
 	$districts = District::find_this_query($sql);
 	echo "<option></option>";
 	foreach($districts as $district){
 		echo "<option value='{$district->id}'>{$district->district_name}</option>";
 	}
 }
}

if(isset($_POST['district_id'])){
 $district_id = $database->escape_string($_POST['district_id']);
 if(!empty($district_id)){
 	echo "<option value=''></option>";
 	$sql = "SELECT * FROM commune WHERE ref_id = '$district_id'";
 	$communes = Commune::find_this_query($sql);
 	foreach($communes as $commune){
 		echo "<option value='{$commune->id}'>{$commune->commune_name}</option>";
 	}
 }
}

 ?>