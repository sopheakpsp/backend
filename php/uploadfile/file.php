<?php 

echo __FILE__ . "<br>";

echo __DIR__ . "<br>";

echo __LINE__ . "<br>";

echo file_exists(__FILE__)? "Yes" . "<br>" : "No" . "<br>";

echo file_exists(__DIR__)? "Yes" . "<br>" : "No" . "<br>";

echo is_dir(__FILE__)? "Yes"  . "<br>": "No" . "<br>";

echo is_file(__DIR__)? "Yes"  . "<br>": "No" . "<br>";


echo file_exists("uplad")? "Yes" . "<br>" : "No" . "<br>";









 ?>