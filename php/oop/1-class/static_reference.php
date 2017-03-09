<?php 

class Cars{

	static $wheel = 4;

	static function carDetail(){
		echo self::$wheel;
	}

}

class Trucks extends Cars{

	static function display(){
		echo parent::carDetail();
	}
}

Trucks::display();

 ?>