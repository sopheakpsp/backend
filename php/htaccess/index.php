<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>Hello world</p>

	<?php 
	for ($i=0; $i < 10; $i++) { 
		echo "<a href='index.php?p={$i}'>{$i}</a><br>";
	}
	 ?>

</body>
</html>