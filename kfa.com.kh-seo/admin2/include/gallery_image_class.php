<?php 
class Gallery_image extends Db_object{
 	protected static $db_table = "gallery_image";
	protected static $db_table_field = array('id','ref_id', 'filename');
	public $id;
	public $ref_id;
	public $filename;

}
?>