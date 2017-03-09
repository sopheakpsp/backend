<?php
$post = $_POST;
$limit;
$perpage = 3;
$mysqli = new mysqli("localhost","root","","mysample_db");
if($mysqli->connect_error){
    die('Error: ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
}


$numpage = filter_var($post["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
if(!is_numeric($numpage)){
    header('HTTP/1.1 500 Invalid page number!');
    exit();
}

$posisi = (($numpage - 1) * $perpage);
$hasil = $mysqli->prepare("select * from post limit ?, ?");
$hasil->bind_param("dd", $posisi, $perpage);
$hasil->execute();
$hasil->bind_result($id, $name, $message);
while($hasil->fetch()){
	echo '<div class="well well-sm">'.$id.' '.$name.'<br><br>'.$message.'</div>';
}
