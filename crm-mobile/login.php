<?php ob_start(); ?>
<?php require_once("include/init.php"); ?>
<?php 
$username = "";
$password = "";
$message = "";
if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	$user_found = User::verify_user($username, $password);

	if($user_found){
		$session->login($user_found);
		redirect("index.php");
	}
	else{
		$message = "Your password or username are not correct, check your input again or contact administrator.";
	}
}
 ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link rel='shortcut icon' type='image/ico' href='img/icon.png'>
    <title>Login Request - CRM MANAGEMENT SYSTEM</title>

    <link rel="stylesheet" href="css/login-normalize.css">
	<link rel="stylesheet" href="css/login-style.css">

	<script src="js/login-prefixfree.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>

  <body>

    <div class="login">
		<h1>Login</h1>
	    <form method="post" action="" >
	    	<input type="text" name="username" placeholder="Username" required="required" value="<?php echo htmlentities($username);?>"/>
	        <input type="password" name="password" placeholder="Password" required="required" />
	        
	        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
	    </form>
	    <h3 style="color:white"><?php echo htmlentities($message);?></h3>
	</div>
    
    <script src="js/login-index.js"></script>	
  </body>
</html>