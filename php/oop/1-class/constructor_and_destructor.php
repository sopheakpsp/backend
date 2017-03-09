<?php 

/**
* __construct = function is automatically initial without calling function.
* __destruct = 
*/
class Cars
{

	public $wheel = 4;
	static $door = 4;
	
	function __construct()
	{
		echo $this->wheel++; // public variable is nothing to increase
		echo self::$door++ . "<br>"; // static is use for increment when your function is called
	}

	function __destruct(){
		echo $this->wheel; // public variable is nothing to increase // echo $this->wheel++; are same to $this->wheel

		echo self::$door++ . "<br>"; // static is use for increment when your function is called
	}
}

$bwm = new Cars();

$audi = new Cars();

$ferrari = new Cars();

 ?>