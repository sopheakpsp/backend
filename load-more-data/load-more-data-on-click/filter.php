<?php 
$string = "yahoo90987987988@yahoo.com";


var_dump(filter_var($string, FILTER_VALIDATE_EMAIL, FILTER_FLAG_STRIP_HIGH));


 ?>