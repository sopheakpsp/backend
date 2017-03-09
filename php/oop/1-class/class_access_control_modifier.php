<?php 

/**
* public = allow whole program access class's properties
* private = only class itself can access class's properties
* protected = only class itself and sub-class can access class's properties
*/
class Cars
{
	public $wheel = 4;
	private $door = 4;
	protected $seat = 5;
	
	function carDetail()
	{
		return $this->wheel . $this->door . $this->seat;
	}
}

$bwm = new Cars();

echo $bwm->wheel;

// echo $bwm->door; can not access to private properties of class Cars()

// echo $bwm->seat; can not access to protected properties of class Cars()



 ?>