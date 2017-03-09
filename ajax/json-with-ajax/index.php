<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax with JSON</title>
</head>
<body>
	<h1>JSON Response</h1>
	<p id="data"></p>
    
    <form action="">
        <input type="text" name="input" id="input">
        <button type="submit" name="add" id="add">Add</button>
    </form>
 
<script>
	function _($e){
		return document.getElementById($e)
	}
	var output = _('data');
	output.innerHTML = "update HTML";

	var xhr = new XMLHttpRequest();
	var url = "data.php";

	xhr.open("post", url, true);
	xhr.setRequestHeader("content-type", "application/json");
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			// console.log(xhr.responseText);
			var jcontent = JSON.parse(xhr.responseText);
			for(var obj in jcontent){
				output.innerHTML += '<div>'+jcontent[obj].firstname+' '+jcontent[obj].lastname+' '+jcontent[obj].age+'</div>';
			}
			// console.log(jcontent);
		}
	}

	xhr.send();

</script>
</body>
</html>