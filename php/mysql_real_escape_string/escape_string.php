<form action="escape_string.php" method="post">
	<input type="text" name="string">
	<input type="submit" name="submit">
</form>

<?php 

if (isset($_POST['submit'])) {
	$string = $_POST['string'];
	$escape_string = mysql_real_escape_string($string);

	echo $string. "<hr>";
	echo $escape_string;
}

 ?>