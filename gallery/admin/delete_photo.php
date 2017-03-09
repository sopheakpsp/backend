<?php include("include/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");}  ?>

<?php 
	if(empty($_GET['id'])){
		redirect("photo.php");
	}
	else{
		// echo "it work";
		$photo = Photo::find_by_id($_GET['id']);
		if($photo){
			$photo->delete_photo();
			redirect("photo.php");
		}
	}

 ?>