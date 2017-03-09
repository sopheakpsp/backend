<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>រស្មីកម្ពុជា</title>
<link rel="shortcut icon" href="img/icon.png">
<link rel='stylesheet' type='text/css' href='font/Kh-Battambang.ttf' >
<link rel="stylesheet" type="text/css" href="css/button.css">
<link rel="stylesheet" type="text/css" href="css/textbox.css">
<script type="text/javascript" src="js/dateTime.js"></script>
<style type="text/css">
@font-face {
    font-family: "Kh Battambang";
    src: url("font/Kh-Battambang.eot");
	src: local("Kh Battambang"), url("font/Kh-Battambang.ttf") format("truetype");}
body{
	color:#2e2e2e;
	font-size:15px;
	font-family:"Kh Battambang"}
	
.page{
	width:900px;
	height:500px;
	margin:auto;
	margin-top:70px;
	border:1px solid #cacaca;
	background:#f1f1f1;
	box-shadow: 0.5px 0.5px 5px #F3F3F3;}
	
.c-left{
	width:250px;
	float:left;
		/*border:1px solid #cacaca;*/}
		
.c-right{
	width:600px;
	float:right;
	text-align:center;
		/*border:1px solid #cacaca;*/}
		
.logplace{
	width:inherit;
	margin-top:90px;}
	
.clear-float{
	clear:both}
	
</style>
</head>

<body>
<div class="page">
	<div class="c-left">
    <div class="logplace">
	  <div style="width:300px;
            			height:30px;
            			position:relative;
            			background:#3375a0; 
                        padding:0px 2px 0px 0px;
                        text-align:left; 
                        color:#f1f1f1;
                        border:1px solid #cacaca; 
                        border-left:none;
                        font-size:15px;">
            <div style="background:#333; 
                        width:45px; 
                        height:30px; 
                        position:absolute;
                        background:#1e455e;
                        background-image:url(img/key.png);
                        background-repeat:no-repeat;
                        background-position:center;"></div>
                        <div style="padding:3px 0px 0px 50px">សំណើរនៃការប្រើប្រាស់ប្រព្រ័ន្ធ</div></div>
                        <form action="index.php" method="post">
          	<table style="margin-top:10px; margin-left:50px; border-collapse:collapse">
            	<tr>
                	<td width="190">ឈ្មោះអ្នកប្រើប្រាស់:</td>
                </tr>
                <tr>
                	<td><input type="text" name="username" size="35" id="" width="200px" class="txtbox"></td>
                </tr>
                <tr>
                	<td>លេខសំងាត់:</td>
                </tr>
                <tr>
                	<td><input type="password" name="password" size="35" id="" class="txtbox"></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="ចូលទៅកាន់ប្រព័ន្ធ" name="btn_submit" id="" class="btn-positive" style="margin-top:15px"></td>
                </tr>
            </table>
            </form>
            
      </div><!--close logplace-->
    </div><!--close c-left-->
    <div class="c-right">
    	<div style="width:522px; 
        			height:222px; 
                    margin-top:50px;
                    margin-left:40px;
                    background-image:url(img/rsk-logo.png)"></div>
                    
     <div style="margin-top:180px; margin-right:30px; text-align:right">           
		<script type="text/javascript">
            showDate();
        </script>
     </div>            
    </div><!--close c-right-->
    
    <div class="clear-float"></div>
    
</div><!--close page-->

</body>
</html>

<?php 

// define("DB_HOST", "localhost");
// define("DB_USER", "root");
// define("DB_PASSWORD", "");
// define("DB_DATABASE", "rsk");

// $connectionnection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
//     if(!$connectionnection){
//         die("cannot connect to database". mysql_error());
//     }

$db_hostname = 'localhost';
$db_database = 'rsk';
$db_username = 'root';
$db_password = '';
$connectionnection =  new mysqli($db_hostname,$db_username,$db_password,$db_database);
if(!$connectionnection)die($connectionnection->connect_error);
?>

<?php
// $connection = mysqli_connect("localhost","root","");
// mysqli_select_db($connection, "rsk");


session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']); 


$sql = "SELECT * FROM user WHERE username='$myusername' and password='$mypassword'";
$result = mysqli_query($connectionnection, $sql);
$row = mysqli_fetch_array($result);
$group = $row['group'];
$name = $row['u_name'];

$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{


$_SESSION['group']=$group;
$_SESSION['login_user']=$myusername;
$_SESSION['u_name']=$name;

header("Location:customer.php");
}
else 
{
header("location: index.php");
}
}
?>

<?php
$logout = isset($_REQUEST['logout'])?$_REQUEST['logout']:null;
	if($logout==1){
	session_destroy();
	}
?>