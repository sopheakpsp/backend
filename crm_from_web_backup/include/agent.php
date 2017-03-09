<?php 
class Agent extends Db_object {
	protected static $db_table = "staff";
	protected static $db_table_field = array('id','name','position','phone','email','image');
	public $id;
	public $name;
	public $position;
	public $phone;
	public $email;
	public $image;
	
}
 
 ?>