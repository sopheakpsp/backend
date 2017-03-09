<?php 
require_once('init.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$filename = $_GET['filename'];
	$p_id = $_GET['p_id'];
	unlink('../../'.$filename);
	$sql = "DELETE FROM property_image WHERE id = " . $id;
	$query = $database->query($sql);

	redirect('../property_confirm.php?id='.$p_id);
}

 ?>