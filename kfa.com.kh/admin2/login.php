<?php ob_start(); ?>
<?php require_once("include/init.php"); ?>
<?php 

if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	$user_found = User::verify_user($username, $password);

	if($user_found){
		$session->login($user_found);
		redirect("property_managing.php");
	}
	else{
		$message = "Your password or username are not correct, check your input again or contact administrator.";
	}
}
else{
	$username = "";
	$password = "";
	$message = "";
}

 ?>
<?php require_once("include/header.php"); ?>
 <div class="col-md-4 col-md-offset-4">
 	<h3 class="bg-danger"><?php echo htmlentities($message);?></h3>
 	<form action="" method="post">
 		<div class="form-group">
	 		<label for="username">Username</label>
	 		<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username);?>">
 		</div>
 		<div class="form-group">
	 		<label for="password">Password</label>
	 		<input type="password" class="form-control" name="password">
 		</div>
 		<div class="form-group">
 			<input type="submit" name="submit" class="btn btn-primary">
 		</div>
 	</form>
 </div>
<?php require_once("include/footer.php"); ?>