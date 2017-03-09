<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
	<!-- maps -->
	<div id="myMap"></div>
	<input type="text" name="auto" id="autocomplete"> <!--auto complete need jquery ui-->

	<!-- form -->
	<form action="save.php" method="post">
		<div id="maps-data"></div>
		<input type="submit">
	</form>
	
	<div id="latlng">latlng</div>

<!-- script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw"></script>
<script src="map-option.js"></script>	
</body>
</html>