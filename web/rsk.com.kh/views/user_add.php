
<div style="color:#FF8080"></div>

<form name="" action="user_add.php" method="post" onSubmit="">
  <table width="617">
    <tr>
      <td height="39" colspan="3" scope="col"><div id="black_message"></div></td>
    </tr>
    <tr>
    <th width="149" scope="col"><div align="left">លេខអត្តសញ្ញាណបណ្ឌ</div></th>
    <th width="378" scope="col"><div align="left">
      <input type="text" name="u_number" value="" class="txtbox" onfocus="document.getElementById('tip').style.visibility = 'visible';" onblur="document.getElementById('tip').style.visibility = 'hidden';"/>
    </div></th>
    
    <td style="position:relative"><div id="tip" class="tooltip">"សូមបញ្ចូលលេខអត្តសញ្ញាណបណ្ឌ</div></td>
    </tr>
  <tr>
    <td><div align="left">ឈ្មោះ</div></td>
    <td><div align="left">
      <input type="text" name="u_name" class="txtbox" onfocus="document.getElementById('tip1').style.visibility = 'visible';" onblur="document.getElementById('tip1').style.visibility = 'hidden';"/>
 
    </div></td>
    <td style="position:relative"><div id="tip1" class="tooltip">Full Name</div></td>
    </tr>
  <tr>
    <td><div align="left">លេខទូរស័ព្ទ</div></td>
    <td><div align="left">
      <input type="text" name="u_phone" class="txtbox" onfocus="document.getElementById('tip2').style.visibility = 'visible';" onblur="document.getElementById('tip2').style.visibility = 'hidden';"/>

    </div></td>
    <td style="position:relative"><div id="tip2" class="tooltip">Phone Number</div></td>    
    </tr>
  <tr>
    <td><div align="left">ឈ្មោះសំរាប់ប្រើប្រាស់</div></td>
    <td><div align="left">
      <input type="text" name="username" class="txtbox" onfocus="document.getElementById('tip3').style.visibility = 'visible';" onblur="document.getElementById('tip3').style.visibility = 'hidden';"/>
    
    </div></td>
    <td style="position:relative"><div id="tip3" class="tooltip">Username</div></td>
    </tr>
  <tr>
    <td><div align="left">លេខសំងាត់</div></td>
    <td><div align="left">
      <input type="text" name="password" class="txtbox" onfocus="document.getElementById('tip4').style.visibility = 'visible';" onblur="document.getElementById('tip4').style.visibility = 'hidden';"/>
  
    </div></td>
    <td style="position:relative"><div id="tip4" class="tooltip">Password</div></td>
    </tr>
  <tr>
    
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"​ name="submit_user" value="បន្ថែម" class="btn-positive" />
      <input type="submit"​ name="submit_user_again" value="បន្ថែម១ទៀត" class="btn-positive" />
      <input type="submit"​ name="cancel_user" value="មិនបន្ថែម" class="btn-negative" /></td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form> 

<?php
function add_user(){
		
		include("phpfunctions/connection.php");
		$u_number = trim($_POST['u_number']);
		$u_name = $_POST['u_name'];
		$u_phone = $_POST['u_phone'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "INSERT INTO `rsk`.`user` (`u_number`, `u_name`, `u_phone`, `username`, `password`, `group`, `position`, `active`) VALUES ('$u_number', '$u_name', '$u_phone', '$username', '$password', '2', '2', '2');";
											   	
		mysql_query("SET character_set_client=utf8", $con);
		mysql_query("SET character_set_connection=utf8", $con);
		mysql_query($query, $con) or die(mysql_error());
	}

	
	if(isset($_POST['submit_user']) && $_POST['submit_user']=="បន្ថែម"){

		add_user();
		if(mysql_affected_rows()==true){
			
			header('location: user.php?mess=1');
		}
		else{
			echo "error while data sending";
		}
	}
	
	if(isset($_POST['submit_user_again']) && $_POST['submit_user_again']=="បន្ថែម១ទៀត"){
		add_user();
		if(mysql_affected_rows()==true){
			header("location:user_add.php?mess=1");
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
	
	
	
	


?>