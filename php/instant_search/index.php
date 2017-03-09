<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>instant search</title>
</head>
<body>
search box <input type="text" id="search">
<div id="search_result"></div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	
<!-- search.js -->
<script>
	$("#search").keyup(function() {
		var search_value = $(this).val();
		$.post('search.php', {search_value: search_value}, function(data) {
			$("#search_result").html(data);
		});
	});
</script>
</body>
</html>