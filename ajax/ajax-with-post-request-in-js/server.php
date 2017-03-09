<?php 
	$data = $_REQUEST; //user $_POST kor ban, but use $_REQUEST it work both GET and POST
	$userText = $_REQUEST['userText'];
	echo strtoupper($userText);

 ?>