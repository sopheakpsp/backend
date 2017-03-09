<?php 
require_once("../include/init.php");
global $database;

################ Continue generating Map XML #################

// Create new DOMDocument object
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 

// Select all the rows in the markers table
$results = $database->query("SELECT property.*, property_type.type_name, user_tb.first_name, user_tb.last_name 
  FROM property 
  LEFT JOIN property_type
  ON property.type = property_type.id 
  LEFT JOIN user_tb
  ON property.agent = user_tb.id
  WHERE lat > 0 AND status <> '5'");

if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 

//set document header to text/xml
header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each
while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$obj->id);
  $newnode->setAttribute("thumbnail",$database->escape_string($obj->thumbnail));
  $newnode->setAttribute("code",$obj->code);
  $newnode->setAttribute("type", $obj->type_name." for ".$obj->category);
  $newnode->setAttribute("content", "L: ".$obj->land_size."sqm, B: ".$obj->house_size."<br/>Sale price: $".number_format($obj->sale_price, 2)."<br/>Rend price: $".number_format($obj->rent_price, 2)."<br/> $".number_format($obj->lp, 2)."/sqm<br/>Listed by: <span class='capital'>".$obj->first_name." ".$obj->last_name."</span>");
  $newnode->setAttribute("lat", $obj->lat);  
  $newnode->setAttribute("lng", $obj->lng);  
}

echo $dom->saveXML();


  

 ?>