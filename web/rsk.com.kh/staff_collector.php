<?php
	$mess = isset($_REQUEST['mess'])?$_REQUEST['mess']:null;
	if($mess==1){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការបន្ថែមបានជោគជ័យ!</p>
		</div>";
	}
	
	
	
	$mess = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	if($mess=="1"){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការកែប្រែបានជោគជ័យ</p>
         </div>";
	}
	
	
	
	
	$mess = isset($_REQUEST['del'])?$_REQUEST['del']:null;
	if($mess=="ok"){
	echo "<div id='object' class='message_del'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/deleted_trush.png' />
	    
		  <p style='float:left;' >ឯកសារត្រូវបានបញ្ជូនទៅកាន់ធុងឯកសារបណ្តោះអាសន្ន</p>
         </div>";
	}
	
	
	
	
	
	include("phpfunctions/connection.php");
	$select = "SELECT s_id FROM staff WHERE active = '1'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "បុគ្គលិក";
	$content_title = "បុគ្គលិក (".$num_rows."នាក់)";
	$page = "staff";
	include ("main/layout.php");
?>
	
	
