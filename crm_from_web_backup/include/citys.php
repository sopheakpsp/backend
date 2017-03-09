<?php 
class City extends Db_object{
	protected static $db_table = "city";
	protected static $db_table_field = array('id','city_name');
	public $id;
	public $city_name;
}

 ?>