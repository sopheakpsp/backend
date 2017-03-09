<?php	
	$title = "បន្ថែមជំនួយការ";
	$content_title = "បន្ថែមជំនួយការ";
	$page = "user_add";
	include ("main/layout.php");

	$mess = isset($_REQUEST['mess'])?$_REQUEST['mess']:null;
	if($mess==1){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការបន្ថែមត្រូវបានជោគជ័យ!</p>
		</div>";
	}
	
	
	
	$mess = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	if($mess=="1"){
	echo "<div id='object' class='message'> 
		  <img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  <p style='float:left;' >ការកែប្រែត្រូវបានជោគជ័យ</p>
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
	
	
