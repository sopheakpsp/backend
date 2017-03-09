<?php
	$title = "បន្ថែមប្រវត្តិរូបបុគ្គលិក";
	$content_title = "បន្ថែមប្រវត្តិរូបបុគ្គលិក";
	$page = "staff_add";
	include ("main/layout.php");


	function add_staff(){
		include("phpfunction/connection.php");
		$s_number = trim($_POST['s_number']);
		$s_name_kh = trim($_POST['s_name_kh']);
		$s_name_en = trim($_POST['s_name_en']);
		$day_birth = trim($_POST['day_birth']);
		$month_birth = trim($_POST['month_birth']);
		$year_birth = trim($_POST['year_birth']);
		$sex = trim($_POST['sex']);
		$b_sangkat = trim($_POST['b_sangkat']);
		$b_khan = trim($_POST['b_khan']);
		$b_city = trim($_POST['b_city']);
		$s_phone = trim($_POST['s_phone']);
		$l_home = trim($_POST['l_home']);
		$l_road = trim($_POST['l_road']);
		$l_sangkat = trim($_POST['l_sangkat']);
		$l_khan = trim($_POST['l_khan']);
		$l_city = trim($_POST['l_city']);
		
		$day_start = trim($_POST['day_start']);
		$month_start = trim($_POST['month_start']);
		$year_start = trim($_POST['year_start']);
		
		
		$s_position = trim($_POST['s_position']);
		@$s_place_work = $_POST['s_place_work'];
		
		
		
		
		
		$query = "INSERT INTO staff(s_number, 
									s_name_kh, 
									s_name_en, 
									sex, 
									day_birth, 
									month_birth, 
									year_birth, 
									s_phone, 
									b_sangkat, 
									b_khan, 
									b_city, 
									c_home, 
									c_road, 
									c_sangkat, 
									c_khan, 
									c_city, 
									day_start, 
									month_start, 
									year_start, 
									position,
									place,
									datetime,
									active)
						VALUES('$s_number',
								'$s_name_kh', 
								'$s_name_en', 
								'$sex',
								'$day_birth',
								'$month_birth',
								'$year_birth',
								'$s_phone',
								'$b_sangkat',
								'$b_khan',
								'$b_city',
								'$l_home',
								'$l_road',
								'$l_sangkat',
								'$l_khan',
								'$l_city',
								'$day_start',
								'$month_start',
								'$year_start',
								'$s_position',
								'$s_place_work',
								now(),
								'1')";
											   
		
		mysql_query("SET character_set_client=utf8", $con);
		mysql_query("SET character_set_connection=utf8", $con);									   
		mysql_query($query) or die(mysql_error());
}
	
	
	if(isset($_POST['submit_staff']) && $_POST['submit_staff']=="បន្ថែម"){
	add_staff();
		if(mysql_affected_rows()==true){
			
			header('location: staff.php?mess=1');
		}
		else{
			echo "error while data sending";
		}
	}
	
	if(isset($_POST['submit_staff_again']) && $_POST['submit_staff_again']=="បន្ថែម១ទៀត"){
		add_staff();
		if(mysql_affected_rows()==true){
			header("location:staff_add.php?mess=1");
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
	
	
