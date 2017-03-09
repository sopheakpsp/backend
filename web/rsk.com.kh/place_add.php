<?php
	$title = "បន្ថែមតំបន់បុគ្គលិកត្រូវចុះ";
	$content_title = "បន្ថែមតំបន់បុគ្គលិកត្រូវចុះ";
	$page = "place_add";
	include ("main/layout.php");
	
	
	function add_place(){
		include("phpfunctions/connection.php");
		$pl_name = trim($_POST['pl_name']);
		$pl_from = $_POST['pl_to'];
		$pl_to = $_POST['pl_from'];
		$pl_other = trim($_POST['pl_other']);
		
		$query = "INSERT INTO place(pl_name, pl_from, pl_to, other, datetime, active)
										VALUES('$pl_name', '$pl_from', '$pl_to', '$pl_other', now(),'1')";
											   
		
		mysql_query("SET character_set_client=utf8", $con);
		mysql_query("SET character_set_connection=utf8", $con);									   
		mysql_query($query) or die(mysql_error());
}
	
	
	if(isset($_POST['submit_place']) && $_POST['submit_place']=="បន្ថែម"){
	add_place();
		if(mysql_affected_rows()==true){
			
			header('location: place.php?mess=1');
		}
		else{
			echo "error while data sending";
		}
	}
	
	if(isset($_POST['submit_place_again']) && $_POST['submit_place_again']=="បន្ថែម១ទៀត"){
		add_place();
		if(mysql_affected_rows()==true){
			header("location:place_add.php?mess=1");
		}
		else{
			echo "error while data sending";
		}
	}


	$mess = isset($_REQUEST['mess'])?$_REQUEST['mess']:null;
	if($mess==1){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការបន្ថែមបានជោគជ័យ!</p>
		</div>";
	}
	
	
	
		
	
	
?>