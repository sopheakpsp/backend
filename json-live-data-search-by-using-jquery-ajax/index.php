<!DOCTYPE html>
<html>
<head>
	<title>Json Live Data Search by Using JQuery Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container" style="width: 900px">
	<h2 align="center">JSON Data Search by Using jQuery Ajax</h2>
	<div align="center">
		<input type="text" name="search" id="search" placeholder="Search employee detail" class="form-control"/>
	</div>
</div>
<!-- 
ដ

 -->
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#search').keyup(function(){
			$('#result').html();
			var searchField = $('#search').val();
			var expression = new RegExp(searchField, "i");
			$.getJSON('data.json', function(data){
				$.each(data, function(key, value){

					/*if(value.name.search(expression) != -1 || value.location.search(expression) != -1){
						$('#result').append('<li class="list-group-item"><img src="' + value.image + '" height="40" width="40" class="img-thumbnail"/>' + value.name + '</li>')
					}*/
				});
			});
		});
	});
</script>
</body>
</html>
