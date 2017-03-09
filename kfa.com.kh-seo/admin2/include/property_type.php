<?php 
class Property_type extends Db_object {
	protected static $db_table = "property_type";
	protected static $db_table_field = array('id','type_name');
	public $id;
	public $type_name;
}
 

 ?>