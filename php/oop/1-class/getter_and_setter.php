<?php 

/**
* 
*/
class Cars
{

	private $wheel = 4;
	
	function get_value()
	{
		return $this->wheel;
	}

	function set_value($a){
		$this->wheel = $a;
	}
}

$bwm = new Cars();

$bwm->set_value(11);

echo $bwm->get_value();




 ?>