<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Ajax GET with Javascript</title>
</head>
<body>
	<div>Text <input type="text" name="userText" id="userText" onkeyup="updateText();"></div>
	<div>Response <input type="text" name="ResponseServer" id="ResponseServer"></div>

<script type="text/javascript">
	function _($e){
		return document.getElementById($e);
	}

	function updateText(){
		var currentText = _('userText').value;
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if (xhr.readyState == 4 && xhr.status == 200) {
				var response = xhr.responseText;
				_('ResponseServer').value = response;
			}
		}
		xhr.open("GET", "server.php?userText="+currentText, true);
		xhr.send(); //it's mean sending request to server, that onreadystatechange function start change from 0 to 4
	}
</script>
</body>
</html>