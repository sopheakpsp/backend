<?php 

$connection = new mysqli('localhost', 'root', '', 'ajax_db');
if($connection->connect_errno){die('cannot connect to database').mysqli_error();}

if (!empty($_FILES['file'])) {
	$file_count = count($_FILES['file']['name']);
    for($i=0; $i<$file_count; ++$i){
        $files = array($_FILES['file']['name'][$i]=>$_FILES['file']['tmp_name'][$i]);   
        foreach($files as $file_name=>$tmp_file){
            if(move_uploaded_file($tmp_file,'upload/'.$file_name)){ 
                $sql = "INSERT INTO `ajax_db`.`fileupload` (`id`, `org_file`, `md5_file`) VALUES (NULL, '234', '$file_name');";

                mysqli_query($connection, $sql);
            }
        }
    }
}


 ?>