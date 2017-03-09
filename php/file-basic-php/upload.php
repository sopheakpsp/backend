<?php 

if (isset($_POST['submit'])) {
	echo "<pre>";
	print_r ($_FILES['file']);
	echo "</pre>";


// $upload_errors = array(
// 	UPLOAD_ERR_OK => "There is no error.", 
// 	UPLOAD_ERR_INI_SIZE => "The file upload exceeds the upload_max_file_size.",
// 	UPLOAD_ERR_FORM_SIZE => "The file upload exceeds the MAX_FILE_SIZE.",
// 	UPLOAD_ERR_PARTIAL => "The file upload was only partially upload.",
// 	UPLOAD_ERR_NO_FILE => "No file was upload.",
// 	UPLOAD_ERR_NO_TMP_DIR => "Missing temporary folder.",
// 	UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
// 	UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",
// 	);

// $tmp_name = $_FILES['file']['tmp_name'];
// $file = $_FILES['file']['name'];
// $dir = "upload";
	
// 	if (file_exists($dir)) {
// 		if (move_uploaded_file($tmp_name, $dir . "/" . $file)) {
// 		$the_message = "File uploaded successfully.";
// 		}
// 		else{
// 		$the_error = $_FILES['file']['error'];
// 		$the_message = $upload_errors[$the_error];
// 		}
// 	}
// 	else{
// 		$the_message = "No " . $dir . " folder was found.";
// 	}

	
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Upload</title>
</head>
<body>
	<h1>
		<?php 
			if (!empty($upload_errors)) {
				echo $the_message;
			}
		 ?>
	</h1>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file" multiple><br>
		<input type="submit" name="submit">
	</form>
</body>
</html>