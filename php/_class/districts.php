<?php 
class Date_select extends Db_object{
	protected static $db_table = "date_select";
	protected static $db_table_field = array('id','date', 'datetime', 'timestamp', 'time', 'year');
	public $id;
	public $date;
	public $datetime;
	public $timestamp;
	public $time;
	public $year;
}

 ?>