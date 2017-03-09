<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="files[]" multiple="multiple">
<input type="submit" name="submit">
</form>

<?php 



if(isset($_POST['submit'])){
	$count_file = count($_FILES['files']['name']);
	for ($i=0; $i < $count_file; $i++) { 
		get_file($_FILES['files'],$i);
	}

	
}
 ?>

<?php 
function get_file($files, $i){
	$count = count($files);
	echo $_FILES['files']['name'][$i];
}
 ?>
