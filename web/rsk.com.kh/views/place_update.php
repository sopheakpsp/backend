
<?php	
	$update = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	$select = "SELECT * FROM place WHERE pl_id='$update'";


	$sql = mysql_query($select, $con) or die(mysql_error());


    $data=mysql_fetch_array($sql);
	
	
?>

<div style="color:#FF8080"></div>

<form name="formPlace" action="place_update.php" method="post" onSubmit="return black_place()">
  <table width="617">
    <tr>
      <td height="39" colspan="3" scope="col"><div id="black_message"></div></td>
    </tr>
    <tr>
    <th width="149" scope="col"><div align="left">ទីតាំង</div></th>
    <th width="378" scope="col"><div align="left">
	  <input type="hidden" name="id" value="<?php echo $data['pl_id'];?>">
      <input type="text" name="pl_name" value="<?php echo $data['pl_name'];?>" class="txtbox" onfocus="document.getElementById('tip').style.visibility = 'visible';" onblur="document.getElementById('tip').style.visibility = 'hidden';"/>
    </div></th>
    
    <td style="position:relative"><div id="tip" class="tooltip">"សូមកំណត់តំបន់ដែលត្រូវចុះ"​ ឧទាហរណ៍ៈ តំបន់ ក</div></td>
    </tr>
  <tr>
    <td><div align="left">ចាប់ពី</div></td>
    <td><div align="left">
      <input type="text" name="pl_from" value="<?php echo $data['pl_from'];?>" class="txtbox"​​ onfocus="document.getElementById('tip1').style.visibility = 'visible';" onblur="document.getElementById('tip1').style.visibility = 'hidden';"/>
    </div></td>
    <td style="position:relative"><div id="tip1" class="tooltip">"តំណត់តំបន់ ក ចាប់ពី" ឧទាហរណ៍ៈ ‌ផ្លូវព្រះមុនីវង្ស វិមានឯករាជ្យ</div></td>
    </tr>
  <tr>
    <td><div align="left">ដល់</div></td>
    <td><div align="left">
      <input type="text" name="pl_to" value="<?php echo $data['pl_to'];?>" class="txtbox" onfocus="document.getElementById('tip2').style.visibility = 'visible';" onblur="document.getElementById('tip2').style.visibility = 'hidden';"/>
    </div></td>
    <td style="position:relative"><div id="tip2" class="tooltip">"តំណត់តំបន់ ក ទៅដល់" ឧទាហរណ៍ៈ ‌‌ផ្លូវព្រះមុនីវង្ស វត្តភ្នំ</div></td>    
    </tr>
  <tr>
    <td height="52"><div align="left">ផ្សេងៗ</div></td>
    <td>
      <input type="text" name="pl_other" value="<?php echo $data['other'];?>" class="txtbox" onfocus="document.getElementById('tip5').style.visibility = 'visible';" onblur="document.getElementById('tip5').style.visibility = 'hidden';"/></td>
    <td style="position:relative"><div id="tip5" class="tooltip">"ការរៀបរាបើផ្សេងៗ" (បញ្ចូលក៏បាន មិនបាច់ក៏បាន)</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"​ name="update_place" value="កែប្រែ" class="btn-positive" />
      <a href="place.php"><input type="button"​ name="cancel_place" value="មិនបន្ថែម" class="btn-negative" /></a></td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form> 

<?php

	if(isset($_POST['update_place']) && $_POST['update_place']=="កែប្រែ"){
		$pl_name = trim($_POST['pl_name']);
		$pl_from = $_POST['pl_to'];
		$pl_to = $_POST['pl_from'];
		$pl_other = trim($_POST['pl_other']);
		$id = $_POST['id'];
		//echo $id;
//		echo $descript;
		
		
	$update = "UPDATE place SET pl_name = '$pl_name',
									pl_from = '$pl_from',
									pl_to = '$pl_to',
									other = '$pl_other',
									datetime = now()
									WHERE pl_id = '$id'";
	
	mysql_query("SET character_set_client=utf8", $con);
	mysql_query("SET character_set_connection=utf8", $con);	
	mysql_query($update) or die(mysql_error());
	header("location: place.php?update=1");
	}
?>



