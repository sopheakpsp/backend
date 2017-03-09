<?php 
	$connect = new mysqli("localhost","root","","mysample_db");
	$sql = "select * from post limit 5";
	$query = mysqli_query($connect, $sql);
	myslqi

 ?>
<html>
<head>
<title>Dynamic menu and content with PHP AJAX JQUERY</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h2 align="center">Dynamic Menu and Content in PHP AJAX JQUERY</h2>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	    <ul class="nav navbar-nav">
	    <?php 
	    	while ($row = mysqli_fetch_array($query)) {
	    		echo '<li id="'.$row["id"].'"><a href="#">'.$row["page_title"].'</a></li>';
	    	}
	     ?>
	    </ul>
	  </div>
	</nav>
	<br/>
	<span id="page_details"></span>
</div>














<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
$(document).ready(function(){

	function load_page_details(id){
		$.ajax({
			url: "fetch.php",
			method: "POST",
			data: {id:id},
			success:function(data){
				$('#page_details').html(data);
			}
		});
	}

	load_page_details(1); // Home page
});
</body>
</html>

