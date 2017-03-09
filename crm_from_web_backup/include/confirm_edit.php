<?php 
require_once('init.php');
if(empty($_GET['id'])){redirect('property.php');}
$id = $_GET['id'];
$property_code = $_GET['code'];
$sql = "UPDATE property SET status = 1 WHERE id = " . $id;
$query = $database->query($sql);
$session->message("Successfully. Copy this code: <b>". $property_code ."</b>", "success");
redirect('../property.php');

 ?>