
<div style="color:#FF8080"></div>

<form name="form_admin" action="admin_change_pwd.php" method="post" onSubmit="return blank_admin()">
  <table width="617">
    <tr>
      <td height="39" colspan="3" scope="col"><div id="black_message"></div></td>
    </tr>
    <tr>
    <th width="149" scope="col"><div align="left">លេខសំងាត់ចាស់</div></th>
    <th width="378" scope="col"><div align="left">
      <input type="password" name="oldpwd" value="" class="txtbox" onfocus="document.getElementById('tip').style.visibility = 'visible';" onblur="document.getElementById('tip').style.visibility = 'hidden';"/>
    </div></th>
    
    <td style="position:relative"><div id="tip" class="tooltip">"សូមបញ្ចូលលេខសំងាត់ចាស់&quot;</div></td>
    </tr>
  <tr>
    <td><div align="left">លេខសំងាត់ថ្មី</div></td>
    <td><div align="left">
      <input type="password" name="newpwd1" class="txtbox"​​ onfocus="document.getElementById('tip1').style.visibility = 'visible';" onblur="document.getElementById('tip1').style.visibility = 'hidden';"/>
 
    </div></td>
    <td style="position:relative"><div id="tip1" class="tooltip">"លេខសំងាត់ថ្មី&quot;</div></td>
    </tr>
  <tr>
    <td><div align="left">លេខសំងាត់ថ្មី</div></td>
    <td><div align="left">
      <input type="password" name="newpwd2" class="txtbox" onfocus="document.getElementById('tip2').style.visibility = 'visible';" onblur="document.getElementById('tip2').style.visibility = 'hidden';"/>
   
    </div></td>
    <td style="position:relative"><div id="tip2" class="tooltip">&quot;លេខសំងាត់ថ្មី&quot;</div></td>    
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"​ name="submit_admin" value="ផ្តូរ" class="btn-positive" style="width:100px" />
      <input type="button"​ name="cancel_admin" value="មិនផ្តូរ" class="btn-negative" /></td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form> 

<?php
	
	if(isset($_POST['submit_admin']) && $_POST['submit_admin']=="ផ្តូរ"){
		include('phpfunctions/connection.php');
		$newpwd1 = trim($_POST['newpwd1']);
		$user = $_SESSION['login_user'];
		//echo $id;
//		echo $descript;
		
		
	$update = "UPDATE user SET password = '$newpwd1'
									WHERE username = '$user'";
	
	mysql_query("SET character_set_client=utf8", $con);
	mysql_query("SET character_set_connection=utf8", $con);	
	mysql_query($update) or die(mysql_error());
	header("location: admin_change_pwd.php?update=1");
	}
?>



