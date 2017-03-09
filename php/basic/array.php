<?php 

## Index array ##

$names = array('mark', 'sopheak', 'jonh');

echo $names[1];

echo "<hr>";

## Associate Array ##

$names = array('mark' => 14, 'sopheak' => 27, 'jonh' => 31);

echo $names['mark'];

echo "<hr>";

## Multi Dimensional Array ##

/*
name     age    weight
mark     14     30
sopheak  27     55
jonh     31	    71

*/
$students = array(array('mark', 14, 30),
				  array('sopheak', 27, 55),
				  array('jonh', 31, 71));

echo $students[0][0]; 						//$students[row][column]

echo "<hr>";

## Multi Dimensional with associate

$students = array(array('name'=>'mark','age'=>14,'weight'=>30),
				  array('name'=>'sopheak', 'age'=>27, 'weight'=>55),
				  array('name'=>'jonh', 'age'=>31, 'weight'=>71));

echo $students[1]['name']; 					//$students[row][column]

echo "<hr>";

 ?>