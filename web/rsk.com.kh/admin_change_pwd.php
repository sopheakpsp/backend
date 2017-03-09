<?php		
	$title = "ព៌ត័មានផ្ទាល់ខ្លួន";
	$content_title = "ព៌ត័មានផ្ទាល់ខ្លួន";
	$page = "admin_change_pwd";
	include ("main/layout.php");
	
	$mess = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	if($mess=="1"){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការកែប្រែត្រូវបានជោគជ័យ</p>
         </div>";
	}
?>
	
	
