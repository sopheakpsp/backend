<?php 

require_once("init.php");

if (!empty($_FILES['file'])) {
    $ref_id = $_POST['ref_id'];
    $property_code = $_POST['property_code'];
	$file_count = count($_FILES['file']['name']);
    for($i=0; $i<$file_count; ++$i){
        $files = array($_FILES['file']['name'][$i]=>$_FILES['file']['tmp_name'][$i]);   
        foreach($files as $file_name=>$tmp_file){
            if(move_uploaded_file($tmp_file,'..' .DS. '..' .DS. 'property' .DS. $property_code . DS .$file_name)){ 
                $link = 'property/' . $property_code . '/' .$file_name;
                $sql = "INSERT INTO property_image(`id`, `ref_id`, `filename`) VALUES (NULL, '$ref_id', '$link')";
                $query = $database->query($sql);
            }
        }
    }
    echo "ok";
}


 ?>