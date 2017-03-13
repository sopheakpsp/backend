<?php
$post = $_POST;

$perpage = 5;
$mysqli = new mysqli("localhost","root","","mysample_db");
if($mysqli->connect_error){
    die('Error: ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
}


$numpage = filter_var($post["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
if(!is_numeric($numpage)){
    header('HTTP/1.1 500 Invalid page number!');
    exit();
}

$limit = (($numpage - 1) * $perpage);
$sql = $mysqli->prepare("select * from post limit ?, ?");
$sql->bind_param("dd", $limit, $perpage);
$sql->execute();
$sql->bind_result($id, $name, $message);
while($sql->fetch()){
	echo '<div class="well well-sm"><b>'.$id.' '.$name.'</b><br>'.$message.'</div>';
}
