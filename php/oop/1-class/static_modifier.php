<?php 

/**
* regular properties = use the instant to show result "$bwm = new Cars(), $this" this call instant 
* static = no need instant, it refer to the class name to use it 
*/
class Cars
{
	static $wheel = 4;
	
	static function carDetail()
	{
		return Cars::$wheel;
	}
}

$bwm = new Cars();

// echo $bwm->wheel; not to use this

echo Cars::$wheel;

echo Cars::carDetail();

 ?>