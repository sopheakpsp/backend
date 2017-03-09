<?php
	
	
	
	
	include("phpfunctions/connection.php");
	$select = "SELECT p_id FROM products WHERE active = '1'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $num_rows = mysql_num_rows($sql);
		
	$title = "ប្រភេពកាសែត";
	$content_title = "ប្រភេពកាសែតសរុប​ (".$num_rows."ប្រភេទ)";
	$page = "news_kind";
	include ("main/layout.php");


	$mess = isset($_REQUEST['mess'])?$_REQUEST['mess']:null;
	if($mess==1){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការបន្ថែមប្រភេទកាសែតបានជោគជ័យ!</p>
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
	    
		  <p style='float:left;' >ឯកសារត្រូវបានបញ្ជូនទៅកានើធុងឯកសារបណ្តោះអាសន្ន</p>
         </div>";
	}
	
?>
	
	
