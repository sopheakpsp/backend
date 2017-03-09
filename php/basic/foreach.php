<?php 

$names = array('mark', 'sopheak', 'jonh');

foreach ($names as $name) {
	echo $name.'<br>';
}

## Multi dimension array foreach

$students = array(array('name'=>'mark','age'=>14,'weight'=>30),
				  array('name'=>'sopheak', 'age'=>27, 'weight'=>55),
				  array('name'=>'jonh', 'age'=>31, 'weight'=>71));

foreach ($students as $student=>$innerArray) {
	echo $student.'<br>';

	foreach ($innerArray as $item) {
		echo $item.'<br>';
	}
}

foreach ($students as $student) {
	echo $student['name'].'<br>';
}

 ?>