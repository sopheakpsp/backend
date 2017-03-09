<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>This is all about.</div>
	<?php 
	for ($i=0; $i < 10; $i++) { 
		echo "<a href='about.php?p={$i}&article={$i}'>{$i} and {$i}</a><br>";
	}
	 ?>
</body>
</html>