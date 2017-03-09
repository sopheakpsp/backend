<?php

	//include_once('phpfunctions/db.php');
	include_once("phpfunctions/pagination.php");
	
		session_start();
		if(!isset($_SESSION['login_user'])){
			header("location:index.php");}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link rel="shortcut icon" href="img/icon.png">
<link rel='stylesheet' type='text/css' href='font/Kh-Battambang.ttf'>
<link rel="stylesheet" type="text/css" href="css/layout.css" >
<link rel="stylesheet" type="text/css" href="css/search.css">
<link rel="stylesheet" type="text/css" href="css/button.css">
<link rel="stylesheet" type="text/css" href="css/table.css">
<link rel="stylesheet" type="text/css" href="css/textbox.css">
<link rel="stylesheet" type="text/css" href="css/table-two-color.css">
<link rel="stylesheet" type="text/css" href="css/pagination.css">
<link rel="stylesheet" type="text/css" href="css/grey.css".css">
<link rel="stylesheet" type="text/css" href="css/tooltip.css".css">
<link rel="stylesheet" type="text/css" href="css/detail.css".css">

<script type="text/javascript" src="js/dateTime.js"></script>
<script type="text/javascript" src="js/disableKeyChar.js"></script>
<script type="text/javascript" src="js/checkBlank.js"></script>
<script type="text/javascript" src="js/tableAltRowsColor.js"></script>
<script type="text/javascript" src="js/dateOfBirth.js"></script>

<script type="text/javascript" src="jq/jquery.js"></script>
<script type="text/javascript" src="jq/jquery.easing.js"></script>
<script type="text/javascript" src="jq/jquery.collapse.js"></script>

<script type="text/javascript">
$(function(){
				
				$('#collapser').jqcollapse({
				   slide: true,
				   speed: 500,
				   easing: 'easeOutCubic'
				});
				
			});			
</script>

<script type="text/javascript">

$(document).ready(function()
{
	//first slide down and blink the alert box
    $("#object").animate({ 
        top: "0px"
      }, 1000 ).delay(7000);
   
   //close the message box when the cross image is clicked 
   $("#object").animate({ 
        top: "-100px"
      }, 1000 );
});
</script>


<style type="text/css">
.message{
	position:fixed;
	right:15px;
	top : -170px;
	z-index:100;
	padding:5px 30px; 
	background:#DFEFFF; 
	border:1px solid #0080C0
}
.message_del{
	position:fixed;
	border:1px solid #F00;
	right:15px;
	top : -170px;
	z-index:100;
	padding:5px 30px; 
	background:#FFE1E1; 
}
</style>

</head>

<body>
	<div class="page">
	    
    	<div class="header">
        	<img src="img/rsk-logo-small.png" width="auto" height="auto"/>
            
             
        </div><!--end topbar-->
        
        <div class="container">
    
        	<div class="left"><h3>ការគ្រប់គ្រង</h3>
            	<a href="panel.php"><?php $_SESSION['u_name']; $_SESSION['login_user']; ?></a>
                <?php if($_SESSION['group']=="1"){
					include ("components/menu_admin.php");}
					else{include ("components/menu.php");}?>

            </div><!--end left-->
    
            <div class="right">
            
            	<div class="right-topleft">
                	<h3><?php echo $content_title;?></h3>
                </div><!--end right top left-->
                
                <div class="right-topright">
					<?php include("components/search.php");?>
                </div><!--end right top right-->
                <div class="clear"></div>
                
				<!--content here-->
				<?php 
					include ("views/".$page.".php");	
				?>
                <!--end content-->      
                                    
            </div><!--end right-->

        <div class="clear"></div>
   
        </div><!--end container-->
        
        <div class="footer">
       	   	<img src="img/rsk-logo-smallest.png" style="float:left">
                    
            <div style="float:right; margin:5px 15px 0 0">
				<script type="text/javascript">
                    showDate();
                </script>
            </div>   

        <div class="clear"></div>
             
	
	
        </div><!--end footer-->
 
    </div><!--end page-->
</body>
</html>


