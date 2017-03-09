<?php 
	if(isset($_POST['submit'])){
		echo $_POST['a'];
		echo $_POST['b'];
		echo $_POST['c'];
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<form action="" method="post">
	<input type="text" name="a">
	<input type="text" name="b">
	<input type="text" name="c">
	<input type="submit" name="submit" class="noEnterSubmit">
</form>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
	$(document).ready(function() {
	  $(window).keydown(function(event){
	    if(event.keyCode == 13) {
	      event.preventDefault();
	      return false;
	    }
	  });
	});
	</script>


</body>
</html>