<?php 

class Db_object{

	public function properties(){
		//return get_object_vars($this);
		//i not use get_object_vars, because it can take all the class properties to it. so it will be the big error. But method below i not yet understand
		//i use $this->$db_field because i want the value, if only put $db_field it will equal to username, password,...

		$properties = array();

		foreach (static::$db_table_field as $db_field) {
			if(property_exists($this, $db_field)){
				$properties[$db_field] = $this->$db_field;
			}
		}

		return $properties;	

	}

	public function clean_properties(){
		global $database;

		$clean_properties  = array();
		foreach ($this->properties() as $key => $value) {
			$clean_properties[$key] = $database->escape_string($value);
		}

		return $clean_properties;
	}

	public static function find_all(){
		return static::find_this_query("SELECT * FROM ". static::$db_table ." ORDER BY id DESC");
	}

	public static function find_all_asc(){
		return static::find_this_query("SELECT * FROM ". static::$db_table ." ORDER BY id ASC");
	}

	public static function find_all_with_limit($limit){
		return static::find_this_query("SELECT * FROM ". static::$db_table ." ORDER BY id DESC LIMIT $limit");
	}

	public static function find_all_active_with_limit($limit){
		return static::find_this_query("SELECT * FROM ". static::$db_table ." WHERE status = 1 ORDER BY id DESC LIMIT $limit");
	}

	public static function find_by_type_with_limit($type, $limit){
		return static::find_this_query("SELECT * FROM ". static::$db_table ." WHERE type = '$type' AND status = 1 ORDER BY RAND() LIMIT $limit");
	}

	public static function find_all_by_id($id){
		return static::find_this_query("SELECT * FROM ". static::$db_table ." WHERE ref_id = $id");
	}

	public static function find_by_id($id){
		$result_array = static::find_this_query("SELECT * FROM ". static::$db_table ." WHERE id = $id LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_ref_id($id){
		$result_array = static::find_this_query("SELECT * FROM ". static::$db_table ." WHERE ref_id = $id AND filename NOT LIKE '%thumnail%' LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_this_query($sql){
		global $database;
		$the_object_array = array();
		// $sql = "SELECT * FROM comment WHERE photo_id = 18";
		$result_set = $database->query($sql);
			if ($result_set === false) {
				die("no result set");
			}
			while ($row = mysqli_fetch_array($result_set)) {
				$the_object_array[] = static::instantiation($row);
			}
		
		return $the_object_array;
	}

	public static function instantiation($record){
		$calling_class = get_called_class();
		$the_object = new $calling_class;

			foreach ($record as $attribute => $value) {

				if ($the_object->has_the_attribute($attribute)) {
					$the_object->$attribute = $value;
				}
			}

		return $the_object;
	
	}

	private function has_the_attribute($attribute){
		$object_properties = get_object_vars($this);
		return array_key_exists($attribute, $object_properties);
	}

	public function create(){
		global $database;

		$properties = $this->properties();

		$sql = "INSERT INTO ". static::$db_table ."(". implode(",", array_keys($properties)) .") VALUES('";
		$sql.=  implode("','", array_values($properties)) . "')";
		// exit($sql);

		if ($database->query($sql)) {
			$this->id = $database->insert_id();
			return true;
		}
		else{
			return false;
		}
	}	
	
	public function save(){
		// exit($this->id);
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function update(){
		global $database;

		$properties = $this->properties();

		foreach ($properties as $key => $value) {
			$properties_pairs[] = "{$key} = '{$value}'";
		}

		$sql = "UPDATE ". static::$db_table ." SET ";
		$sql.= implode(",", $properties_pairs);
		$sql.= " WHERE id = " .$database->escape_string($this->id);
// exit($sql);
		$database->query($sql);

		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
	}

	public function delete(){
		global $database;

		$sql = "DELETE FROM ". static::$db_table ." WHERE id = ". $database->escape_string($this->id) ." LIMIT 1";
		
		$database->query($sql);
		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
	}

	public $tmp_name;
	public $upload_dir;
	public $errors = array();
	public $upload_errors = array(
								UPLOAD_ERR_OK => "There is no error.", 
								UPLOAD_ERR_INI_SIZE => "The file upload exceeds the upload_max_file_size.",
								UPLOAD_ERR_FORM_SIZE => "The file upload exceeds the MAX_FILE_SIZE.",
								UPLOAD_ERR_PARTIAL => "The file upload was only partially upload.",
								UPLOAD_ERR_NO_FILE => "No file was upload.",
								UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder.",
								UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
								UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",
								);
	
	// $file = $_FILES['file']
	public function set_file($file){
		if(empty($file) || !$file || !is_array($file)){
			$errors[] = "There was no file upload here.";
			return false;
		}
		elseif ($file['error'] != 0) {
			$this->errors[] = $this->upload_errors[$file['error']];
			return false;
		}
		else{
			$this->filename = basename($file['name']);
			$this->tmp_name = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
			return $this;
		}
	}

	public static function count_all(){
		global $database;

		$sql = "SELECT COUNT(*) FROM " . static::$db_table;
		$result_set = $database->query($sql);
		$row = mysqli_fetch_array($result_set);

		return array_shift($row);
	}

	public static function count_all_active(){
		global $database;

		$sql = "SELECT COUNT(*) FROM " . static::$db_table ." WHERE status = 1";
		$result_set = $database->query($sql);
		$row = mysqli_fetch_array($result_set);

		return array_shift($row);
	}

	public static function count_by_status($status){
		global $database;

		$sql = "SELECT COUNT(*) FROM " . static::$db_table ." WHERE status = {$status}";
		$result_set = $database->query($sql);
		$row = mysqli_fetch_array($result_set);

		return array_shift($row);
	}

	public static function count_by_agent($agent, $status){
		global $database;

		$sql = "SELECT COUNT(*) FROM " . static::$db_table ." WHERE status = {$status} AND agent = {$agent}";
		$result_set = $database->query($sql);
		$row = mysqli_fetch_array($result_set);

		return array_shift($row);
	}

	public static function count_all_by_agent($agent){
		global $database;

		$sql = "SELECT COUNT(*) FROM " . static::$db_table ." WHERE agent = {$agent}";
		$result_set = $database->query($sql);
		$row = mysqli_fetch_array($result_set);

		return array_shift($row);
	}


}

 ?>