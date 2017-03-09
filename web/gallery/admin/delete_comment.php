<?php include("include/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php");}  ?>

<?php 
	if(empty($_GET['id'])){
		redirect("comment.php");
	}
	else{
		$comment = Comment::find_by_id($_GET['id']);
		if($comment){
			$comment->delete();
			redirect("comment.php");
		}
	}


 ?>