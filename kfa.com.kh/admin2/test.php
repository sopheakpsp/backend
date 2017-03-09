<?php 
if (isset($_POST["name"])) {
	$name = $_POST['name'];
	$email = $_POST['email'];

	echo $name ."<br>". $email;
}

 ?>
<form action="test.php" method="post"> 
	<input type="text" name="name">
	<input type="text" name="email">
	<input type="submit" value="Submit">
</form>