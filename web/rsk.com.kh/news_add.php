<?php
	$title = "បន្ថែមប្រភេទកាសែត";
	$content_title = "បន្ថែមប្រភេទកាសែត";
	$page = "news_add";
	include ("main/layout.php");
	
	function add_product(){
		
		include("phpfunctions/connection.php");
		$descript = trim($_POST['descript']);
		$onemonth = $_POST['oneMonth'];
		$threemonth = $_POST['threeMonth'];
		$sixmonth = $_POST['sixMonth'];
		$oneyear = $_POST['oneYear'];
		$other = trim($_POST['other']);
		
		$query = "INSERT INTO products(p_name, price_one, price_three, price_six, price_year, other, datetime, active)
										VALUES('$descript', '$onemonth', '$threemonth', '$sixmonth', '$oneyear', '$other', now(),'1')";
											   	
		mysql_query("SET character_set_client=utf8", $con);
		mysql_query("SET character_set_connection=utf8", $con);
		mysql_query($query, $con) or die(mysql_error());
	}
	
	
	if(isset($_POST['submit_product']) && $_POST['submit_product']=="បន្ថែម"){

		add_product();
		if(mysql_affected_rows()==true){
			
			header('location: news_kind.php?mess=1');
		}
		else{
			echo "error while data sending";
		}
	}
	
	if(isset($_POST['submit_product_again']) && $_POST['submit_product_again']=="បន្ថែម១ទៀត"){
		add_product();
		if(mysql_affected_rows()==true){
			header("location:news_add.php?mess=1");
		}
		else{
			echo "error while data sending";
		}
	}


	$mess = isset($_REQUEST['mess'])?$_REQUEST['mess']:null;
	if($mess==1){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការបន្ថែមប្រភេទកាសែតបានជោគជ័យ!</p>
		</div>";
	}
	
	
	
	