<?php include("include/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");}  ?>

<?php 
	if(empty($_GET['id'])){
		redirect("user.php");
	}
	else{
		$user = User::find_by_id($_GET['id']);
		if($user){
			$user->delete();
			redirect("user.php");
		}
	}


 ?>