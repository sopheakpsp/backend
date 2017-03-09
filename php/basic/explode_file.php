<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<input type="submit" name="save">
</form>

<?php 
if(isset($_POST['save'])){
	$file = $_FILES['file'];
	$filename = $file['name'];
	$exp = explode('.', $filename);
	echo $exp[0].'<br>';
	echo end($exp);
}


 ?>