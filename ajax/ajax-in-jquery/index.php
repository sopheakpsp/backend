<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Ajax GET with jQuery</title>
</head>
<body>
	<div>Text <input type="text" name="userText" id="userText" onkeyup="updateText();"></div>
	<div>Response <input type="text" name="ResponseServer" id="ResponseServer"></div>

<!-- script path -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
	// GET METHOD
	function updateText(){
		var currentText = $('#userText').val(); 
		$.get("server.php", "userText="+currentText, 
			function(response, status, http){ 
				$('#ResponseServer').val(response);
				// console.log(currentText);
				// console.log(response);
			}, "text"); 
	}

	// POST METHOD
	function updateText(){
		var currentText = $('#userText').val(); 
		$.post("server.php", "userText="+currentText, 
			function(response, status, http){ 
				$('#ResponseServer').val(response);
				// console.log(currentText);
				// console.log(response);
			}, "text"); 
	}
	
/*Note:
"response" = variable store response value, status is response state, http is object of XMLHttpRequest
"text" = datatype that we expect from server
*/	

	// AJAX METHOD
	function updateText(){
		var currentText = $("#userText").val();

		$.ajax({
			url: "server.php",
			type: "GET", //or POST
			data: "userText="+currentText,
			dataType: "text",
			beforeSend: function(http){
				console.log("This data prepare to send to server");
			},
			success: function(response, status, http){
				$("#ResponseServer").val(response);
				console.log(response);
			},
			error: function(http, status, error){
				console.log("The error eccured:" +error);
			},
		});
	}
	
/*Note:
http = object of type XMLHttpRequest
error = contain what kind of error occure
*/

</script>
</body>
</html>