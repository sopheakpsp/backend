<?php 

class Photo extends Db_object{
	protected static $db_table = "photo_tb";
	protected static $db_table_field = array('id','title','description','filename', 'caption', 'alt', 'type','size');
	public $id;
	public $title;
	public $description;
	public $filename;
	public $caption;
	public $alt;
	public $type;
	public $size;

	public function save(){
		if($this->id){
			$this->update();
		}
		else{
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

			$file_to_upload = UPLOAD_FOLDER . DS . $this->filename;

			if(file_exists($file_to_upload)){
				$this->errors[] = "The file {$this->filename} already exists";
				return false;
			}

			if(move_uploaded_file($this->tmp_name, $file_to_upload)){
				if($this->create()){
					unset($this->tmp_name);
					return true;
				}
			}
			else{
				$this->errors[] = 'the file directory dose&#39t has permission';
				return false;
			}

		}
	}

	public function photo_path(){
		return UPLOAD_FOLDER . DS . $this->filename;
	}

	public function delete_photo(){
		if($this->delete()){
			$file_to_delete = UPLOAD_FOLDER . DS . $this->filename;
			return unlink($file_to_delete) ? true : false;
		}
		else{
			return false;
		}	
	}

}


 ?>