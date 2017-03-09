<?php 

require_once("init.php");

if (!empty($_FILES['file'])) {
    $ref_id = $_POST['ref_id'];
    $property_code = $_POST['property_code'];

    $file = $_FILES['file'];
    $file_count = count($file['name']);
    
    for($i=0; $i<$file_count; ++$i){
        $filename = $file['name'][$i];
        $filetmp = $file['tmp_name'][$i];
        $filesize = $file['size'][$i];
	
    $maxSize = 800;
        list($width, $height) = getimagesize($filetmp);
        if($width>$maxSize OR $height>$maxSize){
            $target_file = $filetmp;
            $fn = $filetmp;
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
    
    
        // $files = array($_FILES['file']['name'][$i]=>$_FILES['file']['tmp_name'][$i]);   
        // foreach($files as $file_name=>$tmp_file){

            //rename file before upload
            $exp_name = explode('.', $filename);
            $file_rename = date('YmdHi').round(microtime(true)).$i.'.'.strtolower(end($exp_name));

            $file_to_upload = '..' .DS. 'property' .DS. $property_code . DS .$file_rename;

            if(move_uploaded_file($filetmp, $file_to_upload)){ 
                $link = 'property/' . $property_code . '/' .$file_rename;
                $sql = "INSERT INTO property_image(`id`, `ref_id`, `filename`) VALUES (NULL, '$ref_id', '$link')";
                $query = $database->query($sql);
            }
        // }
    }
    echo "ok";
}


 ?>