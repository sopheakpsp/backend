<?php 

class Cars{

	var $wheel_count = 4;
	var $door_count = 4;

	function gretting(){
		echo "Hello my new world!";
	}

	function car_detail(){
		return "This car has " .$this->wheel_count. " wheels.";
	}
}


$lamborghini = new Cars();
$audi = new Cars();
$bwm = new Cars();
$ferrari = new Cars();


echo $lamborghini->wheel_count ."<br>";

echo $audi->wheel_count=10 ."<br>";

echo $bwm->car_detail() ."<br>";

echo $ferrari->car_detail()	."<br>";




 ?>