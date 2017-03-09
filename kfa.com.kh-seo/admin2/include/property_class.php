<?php 

class Property extends Db_object {

	protected static $db_table = "property";
	protected static $db_table_field = array('id','type', 'category','title', 'price','unit', 'pricing_date', 'code', 'location', 
											'land_size', 'house_size', 'bed_room', 'bath_room', 'floor', 'year_built',
											'description', 'thumbnail', 'agent', 'status', 'listed_by', 'listed_date',
											'updated_by', 'updated_date');
	public $id;
	public $type;
	public $category;
	public $title;
	public $price;
	public $unit;
	public $pricing_date;
	public $code;
	public $location;
	public $land_size;
	public $house_size;
	public $bed_room;
	public $bath_room;
	public $floor;
	public $year_built;
	public $description;
	public $thumbnail;
	public $agent;
	public $status;
	public $listed_by;
	public $listed_date;
	public $updated_by;
	public $updated_date;
	

	public function save_image(){
		if(!empty($this->errors)){
			return false;
		}
		if(empty($this->filename) || empty($this->tmp_name)){
			$this->errors[] = "the file was not available";
			return false;
		}

		if(substr($this->type, 0, 5) != "image"){
			$this->errors[] = "The file upload is not an image.";
			return false;
		}

		$file_to_upload = UPLOAD_FOLDER . DS . USER_FOLDER. DS . $this->filename;

		if(file_exists($file_to_upload)){
			$this->errors[] = "The file {$this->filename} already exists";
			return false;
		}

		if(move_uploaded_file($this->tmp_name, $file_to_upload)){
			unset($this->tmp_name);
			return true;
		}
		else{
			$this->errors[] = 'the file directory dose&#39t has permission';
			return false;
		}
	}

	public function delete_user(){
		if($this->delete()){
			$file_to_delete = UPLOAD_FOLDER . DS . USER_FOLDER. DS . $this->filename;
			return unlink($file_to_delete) ? true : false;
		}
		else{
			return false;
		}	
	}

	public function ajax_save_user_image($filename, $user_id){
		global $database;

		$filename = $database->escape_string($filename);
		$user_id = $database->escape_string($user_id);
		$this->filename = $filename;
		$this->id = $user_id;

		$sql = "UPDATE " . self::$db_table . " SET filename = '{$this->filename}'";
		$sql.= " WHERE id = '{$this->id}'";

		$update = $database->query($sql); 
		
		echo $this->user_image_placeholder();

	}

	public function get_code(){
		$code = 'KFA'.date('mY').'-P';
		$total = Property::count_all() + 1;
		return $code . $total;
	}

}

 ?>