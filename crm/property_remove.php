<?php 
require_once("include/init.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$filename = $_GET['filename'];
	$page = $_GET['page'];
	$exp = explode("/", $filename);
	$delete_path = "../property/{$exp[1]}";
	$files = glob("$delete_path/*"); // get all file names
		foreach($files as $file){ // iterate files
	  		if(is_file($file))
	    unlink($file); // delete file
		}
		rmdir("$delete_path");
	$sql = "DELETE FROM property_image WHERE ref_id=$id";
	$query = $database->query($sql);
	$sql2 = "DELETE FROM property WHERE id=$id";
	$query2 = $database->query($sql2);
	redirect("property_managing.php?page={$page}");	
}
 ?>