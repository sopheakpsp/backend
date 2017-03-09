<?php 
## basic function

function helloWorld(){
	echo "Hello World<br>";
}

helloWorld();


## function with parameter
function sum($num1, $num2){
	echo $num1 + $num2 .'<br>';
}

sum(1,2);
sum(15, 20);


## function return value
function returnSum($num1, $num2){
	return $num1 + $num2;
}

$sum1 = returnSum(15, 30);
$sum2 = returnSum(35, 50);

echo "$sum1 * $sum2 = ". $sum1*$sum2 ;

## global variable function
$name = "Sopheak";
function showName(){
	global $name;										//add global keyword to access variable outside function scope
	echo "The greatest name in the world name $name";
}

showName();






 ?>
