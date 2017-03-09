<?php 
require_once('init.php');
if(empty($_GET['id'])){redirect('property.php');}
!empty($_GET['page'])? $page = $_GET['page'] : "";


$id = $_GET['id'];
$property_code = $_GET['code'];
$sql = "UPDATE property SET status = 1 WHERE id = " . $id;
$query = $database->query($sql);
if(empty($page)){
	$session->message("{$page} Successfully. Copy this code: <b>". $property_code ."</b>", "success");
	redirect('../property.php');
}
else{
	$session->message("Updated Successfully.", "success");
	redirect("../property_managing.php?page={$page}");
}

 ?>