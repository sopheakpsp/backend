<?php 
require_once('init.php');
if(empty($_GET['id'])){redirect('property_managing.php');}
!empty($_GET['page'])? $page = $_GET['page'] : "";

$id = $_GET['id'];
$property_code = $_GET['code'];
if(!empty($page)){
	$session->message($property_code ." Updated Successfully.", "success");
	redirect("../property_managing.php?page={$page}");
}
else{
	$session->message($property_code ." Add Successfully (Contact your administrator if you want to publish).", "success");
	redirect('../property_managing.php');
}
 ?>