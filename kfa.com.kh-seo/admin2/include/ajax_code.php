<?php 

require_once("init.php");

$user = new User();

if(isset($_POST['filename'])){
	$user->ajax_save_user_image($_POST['filename'], $_POST['user_id']);	
	// echo "this is data from server";
}

if(isset($_POST['photo_id'])){
	$user = User::find_by_id($_POST['photo_id']);
	$output = "<img src=" . $user->user_image_placeholder() . ">";
	$output.= "<p>" . $user->filename . "</p>";
	echo $output;
	
}

 ?>