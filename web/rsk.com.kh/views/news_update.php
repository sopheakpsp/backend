<?php	
	include("phpfunctions/connection.php");
	$update = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	$select = "SELECT * FROM products WHERE p_id='$update'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $data=mysql_fetch_array($sql);
	
	
?>



<div style="color:#FF8080"></div>

<form name="formProduct" action="news_update.php" method="post" onSubmit="return checkBlank()">
  <table width="617">
    <tr>
      <td height="39" colspan="3" scope="col"><div id="black_message"></div></td>
    </tr>
    <tr>
    <th width="149" scope="col"><div align="left">បរិយាយ</div></th>
    <th width="378" scope="col"><div align="left">
      <input type="hidden" name="id" value="<?php echo $data['p_id'];?>">
      <input type="text" name="descript" value="<?php echo $data['p_name'];?>" class="txtbox" onfocus="document.getElementById('tip').style.visibility = 'visible';" onblur="document.getElementById('tip').style.visibility = 'hidden';"/>
    </div></th>
    
    <td style="position:relative"><div id="tip" class="tooltip">"សូមបញ្ចូលឈ្មោះនៃប្រភេទកាសែត រឺទស្សនាវដ្តី"​ ឧទាហរណ៍ៈ ‌រស្មីកម្ពុជា</div></td>
    </tr>
  <tr>
    <td><div align="left">តំលៃ/១ខែ</div></td>
    <td><div align="left">
      <input type="text" name="oneMonth" value="<?php echo $data['price_one'];?>" class="txtbox" onKeyPress="return numbersonly(event, false)"​​ onfocus="document.getElementById('tip1').style.visibility = 'visible';" onblur="document.getElementById('tip1').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip1" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>
    </tr>
  <tr>
    <td><div align="left">តំលៃ/៣ខែ</div></td>
    <td><div align="left">
      <input type="text" name="threeMonth" value="<?php echo $data['price_three'];?>" class="txtbox" onKeyPress="return numbersonly(event, false)" onfocus="document.getElementById('tip2').style.visibility = 'visible';" onblur="document.getElementById('tip2').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip2" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>    
    </tr>
  <tr>
    <td><div align="left">តំលៃ/៦ខែ</div></td>
    <td><div align="left">
      <input type="text" name="sixMonth" value="<?php echo $data['price_six'];?>" class="txtbox" onKeyPress="return numbersonly(event, false)" onfocus="document.getElementById('tip3').style.visibility = 'visible';" onblur="document.getElementById('tip3').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip3" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>
    </tr>
  <tr>
    <td><div align="left">តំលៃ/១ឆ្នាំ</div></td>
    <td><div align="left">
      <input type="text" name="oneYear" value="<?php echo $data['price_year'];?>" class="txtbox" onKeyPress="return numbersonly(event, false)" onfocus="document.getElementById('tip4').style.visibility = 'visible';" onblur="document.getElementById('tip4').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip4" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>
    </tr>
  <tr>
    <td height="52"><div align="left">ផ្សេងៗ</div></td>
    <td>
      <input type="text" name="other" value="<?php echo $data['other'];?>" class="txtbox" onfocus="document.getElementById('tip5').style.visibility = 'visible';" onblur="document.getElementById('tip5').style.visibility = 'hidden';"/></td>
      <td style="position:relative"><div id="tip5" class="tooltip">"ការរៀបរាបើផ្សេងៗ" (បញ្ចូលក៏បាន មិនបាច់ក៏បាន)</div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"​ name="update_product" value="កែប្រែ" class="btn-positive"/>
      <a href="news_kind.php"><input type="button"​ name="cancel_update_p" value="មិនកែប្រែ" class="btn-negative" /></a></td>
    <td>&nbsp;</td>
  </tr>
  </table>

<div class="clear"></div>

</form> 


<?php

	if(isset($_POST['update_product']) && $_POST['update_product']=="កែប្រែ"){
		$descript = trim($_POST['descript']);
		$onemonth = $_POST['oneMonth'];
		$threemonth = $_POST['threeMonth'];
		$sixmonth = $_POST['sixMonth'];
		$oneyear = $_POST['oneYear'];
		$other = trim($_POST['other']);
		$id = $_POST['id'];
		//echo $id;
//		echo $descript;
		
		
	$update = "UPDATE products SET p_name = '$descript',
									price_one = '$onemonth',
									price_three = '$threemonth',
									price_six = '$sixmonth', 
									price_year = '$oneyear',
									other = '$other',
									datetime = now()
									WHERE p_id = '$id'";
	
	mysql_query("SET character_set_client=utf8", $con);
	mysql_query("SET character_set_connection=utf8", $con);	
	mysql_query($update) or die(mysql_error());
	header("location: news_kind.php?update=1");
	}
?>