<?php 
class Commune extends Db_object{
	protected static $db_table = "commune";
	protected static $db_table_field = array('id','commune_name', 'ref_id');
	public $id;
	public $commune_name;
	public $ref_id;
}

 ?>