<?php 


/**
* 
*/
class Cars{

	var $carName;
	var $wheels = 4;
	
	function forward() {
		return " car is going forward";
	}

}

/**
* 
*/
class Trucks extends Cars
{
	var $wheels = 10;
	function goLeft()
	{
		return " truck is going left";
	}
}


$audi = new Cars();
$audiTruck = new Trucks();
$audi->carName = "Audi";
$audi->carType = "truck"; 

echo $audi->carName . $audi->forward() . "<br>" ;

echo $audi->carName . $audi->forward() . ' and then ' . $audi->carName . $audiTruck->goLeft() . "<br>" ; 

echo $audi->carName . ' is has ' . $audi->wheels . ' wheels' . "<br>" ;

echo $audi->carName . ' ' . $audi->carType . ' is has ' . $audiTruck->wheels . ' wheels' . "<br>" ; 

echo $audiTruck->forward();

 ?>