<?php
function connection(){
	$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	  
	mysql_select_db("rsk",$con) or die(mysql_error()); 
}
?>