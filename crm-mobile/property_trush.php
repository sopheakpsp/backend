<?php 
require_once("include/init.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$page = $_GET['page'];
	
	$sql2 = "UPDATE property SET status = '5' WHERE id=$id";
	$query2 = $database->query($sql2);
	redirect("property_managing.php?page={$page}");	
}
 ?>