<?php 
class Property_image extends Db_object{
 	protected static $db_table = "property_image";
	protected static $db_table_field = array('id','ref_id', 'filename');
	public $id;
	public $ref_id;
	public $filename;


	public function image_upload($files, $i, $code, $ref_id){

		$message = array();

		$array_name = $files['name'][$i];
	    $array_tmp = $files['tmp_name'][$i];
	    $array_type = $files['type'][$i];
	    $array_size = $files['size'][$i];
	    $array_error = $files['error'][$i];
	    $upload_errors = array(
                                UPLOAD_ERR_OK => "There is no error.", 
                                UPLOAD_ERR_INI_SIZE => "The file upload exceeds the upload_max_file_size.",
                                UPLOAD_ERR_FORM_SIZE => "The file upload exceeds the MAX_FILE_SIZE.",
                                UPLOAD_ERR_PARTIAL => "The file upload was only partially upload.",
                                UPLOAD_ERR_NO_FILE => "No file was upload.",
                                UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder.",
                                UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
                                UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",
                                );

        $maxSize = 800;
        list($width, $height) = getimagesize($array_tmp);
        if($width>$maxSize OR $height>$maxSize){
            $target_file = $array_tmp;
            $fn = $array_tmp;
            $size = getimagesize($fn);
            $ratio = $size[0]/$size[1];
            if($ratio>1){
                $width = $maxSize;
                $height = $maxSize/$ratio;
            }else{
                $width = $maxSize*$ratio;
                $height = $maxSize;
            }
            // exit($fn);
            $src = imagecreatefromstring(file_get_contents($fn));
            $dst = imagecreatetruecolor($width, $height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            $imagejpeg = imagejpeg($dst, $target_file);
            imagedestroy($src);
            imagedestroy($dst); 
        }

            //rename file before upload
            $exp_name = explode('.', $array_name);
            $file_rename = date('YmdH').round(microtime(true)).$i.'.'.strtolower(end($exp_name));

        	$file_to_upload = PROPERTY_FOLDER . DS . $code . DS . $file_rename;

        	if(!empty($array_error)){
                $message[] = $upload_errors[$array_error];
            }

            elseif (empty($array_name) OR empty($array_tmp)) {
                $message[] = "File is not avaiable.";
            }

            elseif (substr($array_type, 0, 5) != "image"){
                $message[] = "File is not an image.";
            }

            elseif (file_exists($file_to_upload)) {
                $message[] = "The file {$array_name} already exists";
            }

            // elseif(basename($array_name)=="thumnail.jpg" OR basename($array_name)=="thumnail.JPG"){
            //     $message[] = "thumnail only";
            // }

            elseif (move_uploaded_file($array_tmp, $file_to_upload)) {
                
                $this->ref_id = $ref_id;
                $this->filename = PROPERTY_FOLDER . '/' . $code . '/' . $file_rename;
                $this->create();

                unset($array_tmp);
                $message[] = "{$array_name} upload successfully.";
            }

            else{
            	$message[] = "Dose&#39t has permission to write file into {$code}"; 
            }
	}
	

}

 ?>