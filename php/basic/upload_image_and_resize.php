<?php 
if(isset($_FILES['file'])){
	$file = $_FILES['file'];
	$filename = $file['name'];
	$filetmp = $file['tmp_name'];
	$filesize = $file['size'];

	$maxSize = 800;
	list($width, $height) = getimagesize($filetmp);
	if($width>$maxSize OR $height>$maxSize){
		$target_file = $file['tmp_name'];
		$fn = $file['tmp_name'];
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


	$dir = 'image/';
	$fileupload = $dir.basename($filename);

	echo '<pre>';
	if (move_uploaded_file($filetmp, $fileupload)) {
	    echo "File is valid, and was successfully uploaded.\n";
	} else {
	    echo "Possible file upload attack!\n";
	}

	echo 'Here is some more debugging info:';
	print_r($_FILES);

	print "</pre>";
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>resize file before upload</title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="submit">
	</form>
</body>
</html>