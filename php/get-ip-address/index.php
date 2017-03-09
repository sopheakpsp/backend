<?php 
$ip = $_SERVER['REMOTE_ADDR'];
var_dump($ip);

$http = $_SERVER['HTTP_X_FORWARDED_FOR'];
var_dump($http);

 ?>