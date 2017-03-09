<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>jquery test</title>
</head>
<body>
	<input type="button" id="click" value="click">

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script>
	$(document).ready(function(){
		$('#click').click(function(){
			alert('ok');
		});
	});
	</script>
</body>
</html>