<?php 
class District extends Db_object{
	protected static $db_table = "district";
	protected static $db_table_field = array('id','district_name', 'ref_id');
	public $id;
	public $district_name;
	public $ref_id;
}

 ?>