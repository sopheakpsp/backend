<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<form action="" enctype="multipart/form-data">
<div class="form-group">
	<div class="form-control">
	<input type="file" name="file[]" multiple>
	</div>
	<a href="">remove</a>
	<input type="button" name="addfile" id="addfile" onclick="addMore();" class="btn btn-defualt" value="add file">
	<input type="button" name="upload" id="upload" class="btn btn-primary" value="upload">
</div>
</form>
	
<!-- Script Block -->
<script src="https://code.jquery.com/jquery-2.2.2.js" integrity="sha256-4/zUCqiq0kqxhZIyp4G0Gk+AOtCJsY1TA00k5ClsZYE=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Upload script -->
<script>
	$(document).ready(function(){
		$('#upload').click(function(e){
			e.preventDefault(); // prevent default submission
			var formData = new FormData($(this).parents('form')[0]) //grap all form data
			$.ajax({
				url: 'upload.php',
				type: 'POST',
				data: formData, //data sent to server
				cache: false, // to unable request page to be cached
				contentType: false, //tell jquery not to set content type
				processData: false, // tell jquery not to process data
				success: function(data){ //alert of data success
					alert("data upload success");
				},
				
			});
			return false;
		});
	});
</script>
</body>
</html>