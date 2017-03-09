<?php 

class User extends Db_object {

	protected static $db_table = "user_tb";
	protected static $db_table_field = array('id','filename', 'username','password', 'first_name','last_name', 'position', 'phone', 'email', 'user_info', 'struc');
	public $id;
	public $filename;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $position;
	public $phone;
	public $email;
	public $user_info;
	public $struc;
	// public $user_image_folder = "user";

	public function user_image_placeholder(){
		return empty($this->filename) ? PLACEHOLDER_IMAGE : UPLOAD_FOLDER . DS . USER_FOLDER . DS . $this->filename;
	}

	public static function verify_user($username, $password){
		global $database;

		$username = $database->escape_string($username);
		$password = $database->escape_string($password);

		$mysql = "SELECT * FROM user_tb WHERE ";
		$mysql .= "username = '{$username}' ";
		$mysql .= "AND password = '{$password}' ";
		$mysql .= "LIMIT 1";

		$result = self::find_this_query($mysql);
		return !empty($result) ? array_shift($result) : false;
	}

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

}


 ?>