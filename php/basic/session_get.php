<?php 

session_start();

$name = $_SESSION['name'];
$age = $_SESSION['age'];
$weight = $_SESSION['weight'];

echo "$name $age $weight";

 ?>