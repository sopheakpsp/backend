<?php 

session_start();

unset($_SESSION['name']); 	//destroy session name

session_destroy();




 ?>