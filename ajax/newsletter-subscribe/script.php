<?php 
	$connection = new mysqli("localhost","root","","ajax");
	if($connection->connect_errno){
		die("Connection error". mysqli_error());
	}

	$data = $_REQUEST;
	$name = $connection->escape_string($data['name']);
	$email = $connection->escape_string($data['email']);

	//if email is exist in server then SKIP and display error
	$sql = "SELECT COUNT(*) FROM subscriber WHERE email='$email'";
	$result = $connection->query($sql);
	$row = $result->fetch_array();
	// echo $row[0];
	// exit(); 
	if($row[0]>0){
		echo "You have already subscribed.";
	}else{
		$sql = "INSERT INTO subscriber SET name='$name', email='$email'";
		$connection->query($sql);

		$to = "myemail@domain.com";
		$subject = 'new subscribe';
		$header = 'From: noreply@domain.com';
		$ip = $_SERVER['REMOTE_ADDR'];
		$date = date('Y/m/d');

		$msg="
		----------
		Form Data:
		----------
		Name: $name
		Email: $email

		Server Information:
		-------------------
		IP Address: $ip
		Date: $date
		";

		// send email
		mail($to, $subject, $header);

		echo "Your subscribtion has been success, Thank you.".$ip.$date;



	}



 ?>