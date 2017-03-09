<?php 
require_once("include/init.php");

$sql = "select property.*, property_type.type_name FROM property LEFT JOIN property_type ON property.type = property_type.id";
$result = $database->query($sql);
if(!$result){
	die("no query");
}
while($row = $result->fetch_object()){
	echo "{$row->type_name} for {$row->category}<br/>";
}
 ?>

