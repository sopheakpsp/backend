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
    date_default_timezone_set("Asia/Bangkok");
    date_default_timezone_get();
 	return date('m-d-Y h:i:s A');   
}

?>