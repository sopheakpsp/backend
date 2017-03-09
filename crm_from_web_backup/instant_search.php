<?php require_once("include/header.php"); ?>

Search box<input type="text" id="search" name="search">
<div id="search_result"></div>

<script>
	$.("#search").keyup(function(){
		alert("keyup");
	});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>