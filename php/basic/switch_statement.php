<?php 

$select = 1;

switch ($select) {
	case 1:
		echo "Number 1";
		break;
	
	case 2:
		echo "Number 2";
		break;

	default:
		echo "Default Value";
		break;
}

$name = "Sopheak";
$nameChange = '';

$action = 'upper';

switch ($action) {
	case 'upper':
		$nameChange = strtoupper($name);
		break;
	case 'lower':
		$nameChange = strtolower($name);

	default:
		$nameChange = $name;
		break;
}

echo $nameChange;

 ?>