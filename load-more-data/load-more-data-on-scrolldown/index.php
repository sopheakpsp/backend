<?php
	$con = mysqli_connect("localhost","root","","mysample_db");
	$sql = "select * from post limit 8";
	$query = mysqli_query($con, $sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Loan More Data from Database on Page Scroll PHP JQUERY AJAX</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>
<div class="container">
	<h1>Loan More Data on Page Scroll Down with PHP AJAX and JQUERY</h1>
	<?php
		while($row = mysqli_fetch_array($query)){
			echo'
					<h2>'.$row["post_id"].' '.$row["post_title"].'</h2>
					<p>'.$row["post_paragraph"].'</p>
			';
		}
	 ?>



</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> <!--bootstrap js need jquery library-->

<script type="text/javascript">
	$(document).ready(function(){ //document.ready function dak kor ban min dak kor ban 
	var offset = 8;

	$(window).scroll(function(){
		if($(window).scrollTop() >= $(document).height() - $(window).height()){
			$.ajax({
			url: "ajax_post_control.php",
			method: "get",
			data: {
				"offset": offset,
				"limit": 5
			},
			success: function(data){
				$(".container").append(data);
				offset += 5;
			}
			});
		}
	});

});
</script>
</body>
</html>
