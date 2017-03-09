<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
		Planet name: <input type="text" class="" onkeyup="updateText();" name="planet" id="planet">
		<p id="">Suggestions:</p>
		<p id="suggestion">See your suggestions here</p>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
	function updateText(){
		var currentText = $("#planet").val();
		$.ajax({
			url: 'server.php',
			type: 'POST',
			data: "planet="+currentText,
			dataType: 'json',
			success: function(response, status, http){
				console.log(response);
				var obj = "";
				$.each(response, function(index, el) {
					obj = obj + "Name:" + el.name +"<br>";
					obj = obj + "No. Days of Year" + el.no_of_days_in_year +"<br>";
					obj = obj + "Order No." + el.order_no + "<br><br>";
				});
				$("#suggestion").html(obj);
			},
			error: function(http, status, error){
				console.log("Error occured:" +error);
			}
		});

	}
</script>
</body>
</html>