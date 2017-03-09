<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maps With Single Marker</title>
	<link rel="stylesheet" href="maps.css">
</head>
<body>
	<div id="maps"></div>
	<div id="lat">Lat</div>
	<div id="lng">Lng</div>

	<textarea id="info-text" onkeyup="updatetext(this);"></textarea>
	
<!-- Script -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>     
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDVJxUFpgrLDakxjSquPl9Oujd4-JwZSjw"></script>
<script src="maps.js"></script>	
</body>
</html>