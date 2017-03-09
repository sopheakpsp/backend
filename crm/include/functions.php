<?php 

// ================================================
// * Autoload is automatic include the file for you.
// * For prepare when PHP cannot found any thing, cannot found the file that you using that class. it scan your directory
// ================================================

function __autoload($class){
	$class = strtolower($class);
	$path = "include/{$class}.php";

		if(file_exists($path)){
			require_once("$path");
		}
		else{
			die("{$class}.php dose not exists.");
		}
}

// ===================
// * Redirect function
// ===================

function redirect($location){
	header("Location:{$location}");
}

function get_date(){
 	return date('Y-m-d');   
}

function get_time(){
	return date("H:i:s");
}

function dateToDb($date){
	$array = explode("/", $date);
	$string = "$array[2]-$array[0]-$array[1]";
	return $newDate = date("Y/m/d", strtotime($string));
}

function dateFromDb($date){
	$array = explode("-", $date);
	exit($array);
	$string = "$array[2]-$array[1]-$array[0]";
	exit($string);
	return $newDate = date("m/d/Y", strtotime($string));
}

?>