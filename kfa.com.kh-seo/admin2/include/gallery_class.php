<?php 
class Gallery extends Db_object {
	protected static $db_table = "gallery";
	protected static $db_table_field = array('id','title','thumbnail');
	public $id;
	public $title;
	public $thumbnail;
}


 ?>