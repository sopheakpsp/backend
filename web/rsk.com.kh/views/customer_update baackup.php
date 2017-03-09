<?php	
	include("phpfunctions/connection.php");
	$update = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	$select = "SELECT * FROM customer WHERE c_id='$update'";
	$sql = mysql_query($select, $con) or die(mysql_error());

    $data=mysql_fetch_array($sql);
	
	
?>

<form action="customer_add.php" method="post">
<table width="100%" border="0">
  <tr>
    <th width="19%" align="right" scope="row"><strong>ឈ្មោះអតិថិជន រឺស្ថានបន</strong></th>
    <td width="81%">
    <input type="text" name="c_name_en" class="txtbox" value="<?php echo $data['c_name_en']?>"/></td>
    <td width="81%">&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row"><u>អាសយដ្ឋាន</u></th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row">ផ្ទះលេខ</th>
    <td><input name="c_home" type="text" class="txtbox" size="5" value="<?php echo $data['c_home']?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row">ផ្លូវ</th>
    <td><input name="c_road" type="text" class="txtbox" size="5" value="<?php echo $data['c_road']?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row">សង្កាត់</th>
    <td><input type="text" name="c_sangkat" class="txtbox" value="<?php echo $data['c_sangkat']?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row">ខណ្ឌ</th>
    <td><input type="text" name="c_khan" class="txtbox" value="<?php echo $data['c_khan']?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row">ក្រុង</th>
    <td><input type="text" name="c_city" class="txtbox" value="<?php echo $data['c_city']?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row"><strong>លេខទូរស៍ព្ទ</strong></th>
    <td><input type="text" name="c_phone" class="txtbox" value="<?php echo $data['c_phone']?>"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" valign="top" scope="row"><strong>ជាវកាសែត</strong></th>
    <td>
    	<table>
		<?php	
			$sql = "SELECT * FROM products INNER JOIN customer_buy_products ON products.p_id = customer_buy_products.p_id AND customer_buy_products.c_id = '$update'";
			mysql_query("SET character_set_client=utf8", $con);
			mysql_query("SET character_set_connection=utf8", $con);	
			$query = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_array($query)){?>
					 <tr>	
            	<td><input type="checkbox" value="<?php echo $row['p_id'];?>" name="checked_news[]" checked="checked">
					<?php echo $row['p_name']?>
                </td>
                <td><input name="qty[]" type="text" class="txtbox" size="3" value="<?php echo $row['qty']?>">ច្បាប់<br/>
                </td>
            </tr>
                
		
           
        	<?php }?>
        </table>
    
					
                    
                    
				
					
	
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row"><strong>រយះពេល</strong></th>
    <td>
    <select name="duration" class="select" style="width:70px">
    	<option value="<?php echo $data['duration']?>"><?php echo $data['duration']?> ខែ</option>
    	<option value="1">១ខែ</option>
        <option value="3">៣ខែ</option>
        <option value="6">៦ខែ</option>
        <option value="12">១ឆ្នាំ</option>
    </select>    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row"><strong>ចាប់ពី</strong></th>
    
    <td>
    
    
    <select name="day_start" id="day_start" class="select" style="width:50px">
    	<option value="<?php echo $data['day_buy']?>"><?php echo $data['day_buy']?></option>
      <option value="<?php echo date('d');?>"><?php echo date('d');?></option>
      <?php 
					for ($i=1; $i<=31; $i++){
					
				?>
      <option value="<?php echo $i;?>"><?php echo $i;}?></option>
    </select>
      <select name="month_start" id="month_start" class="select" style="width:55px">
        <option value="<?php echo date('m');?>" selected="selected"><?php echo date('m');?></option>
        <?php 
					for ($i=1; $i<=12; $i++){
					
				?>
        <option value="<?php echo $i;?>"><?php echo $i;}?></option>
      </select>
      <?php
      	echo $year = date('Y');
	  ?>
      <div id="ch"></div>
      </td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <th align="right" scope="row"><strong>តំលៃសរុប</strong></th>
    <td><input type="text" name="total" class="txtbox" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row"><strong>កក់</strong></th>
    <td><input type="text" name="paid" class="txtbox" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row"><strong>អ្នកដាក់កាសែត</strong></th>
    <td><select name="staff_id" class="select" style="width:auto">
      <?php
				$sql = "SELECT * FROM staff WHERE active='1'";
				
				mysql_query("SET character_set_client=utf8", $con);
				mysql_query("SET character_set_connection=utf8", $con);	
				$query = mysql_query($sql) or die(mysql_error());
				while($data = mysql_fetch_array($query)){
					
					
			?>
      <option value="<?php echo $data['s_id'];?>"><?php echo $data['s_name_kh'];}?></option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th align="right" scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <th align="right" scope="row">&nbsp;</th>
    <td>
    	<input type="submit"​ name="submit_customer" value="បន្ថែម" class="btn-positive" />
      	<input type="submit"​ name="submit_customer_again" value="បន្ថែម១ទៀត" class="btn-positive" />
    	<a href="customer.php"><input type="button"​ name="cancel_customer" value="មិនបន្ថែម" class="btn-negative" /></a></td>
    <td width="679" style="position:relative"></td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<?php

	function add_customer(){
		$checked_news = $_POST['checked_news'];
		$qty = $_POST['qty'];
		$c_name_en = $_POST['c_name_en'];	
		$c_home = $_POST['c_home'];
		$c_road = $_POST['c_road'];
		$c_sangkat = $_POST['c_sangkat'];
		$c_khan = $_POST['c_khan'];
		$c_city = $_POST['c_city'];
		$c_phone = $_POST['c_phone'];
		$duration = $_POST['duration'];
		$day_buy = $_POST['day_start'];
		$month_buy = $_POST['month_start'];
		$total = $_POST['total'];
		$paid = $_POST['paid'];
		$staff_id = $_POST['staff_id'];
		$year = date('Y');
		$plus = $month_buy+$duration;
		
		if($plus>12){
			$month_x = $plus-12;
			$year_x = $year+1;
		
		
		$query = "INSERT INTO customer(c_name_en, 
									c_home, 
									c_road, 
									c_sangkat, 
									c_khan, 
									c_city, 
									c_phone, 
									duration, 
									total,
									paid,
									day_buy, 
									month_buy, 
									year_buy, 
									day_x, 
									month_x, 
									year_x, 
									staff_id, 
									active)
						VALUES('$c_name_en',
								'$c_home', 
								'$c_road', 
								'$c_sangkat',
								'$c_khan',
								'$c_city',
								'$c_phone',
								'$duration',
								'$total',
								'$paid',
								'$day_buy',
								'$month_buy',
								'$year',
								'$day_buy',
								'$month_x',
								'$year_x',
								'$staff_id',
								'1')";
											   
		
		mysql_query("SET character_set_client=utf8", $con);
		mysql_query("SET character_set_connection=utf8", $con);									   
		mysql_query($query) or die(mysql_error());
		
		$c_id = mysql_insert_id();	
			
			$my_errors = array();
				for($count = 0; $count < sizeof($checked_news); $count++)
				{
					if(!empty($checked_news[$count]))
					{
						$checked_news_insert = mysql_real_escape_string($checked_news[$count]);
						$qty_insert = mysql_real_escape_string($qty[$count]);
						
						$query = "INSERT INTO customer_buy_products(c_id, p_id, qty, p_qty) VALUES('".$c_id."','".$checked_news_insert."','".$qty_insert."','300')";
						if(!mysql_query($query))
						{
							$my_errors[] = $checked_news_insert[$count];
						}
					}
				}
				
				if(sizeof($my_errors) > 0)
				{
					//At least one error occurred
					echo "An error occurred while processing the following news' records: <br/>";
					echo "<ol>";
						for($err = 0; $err < sizeof($my_errors); $err++)
						{
							echo "<li>".$my_errors[$err]."</li>";
						}
					echo "</ol>";
				}
				else
				{
					//Everything Ok
					echo "All recoreds have been successfully processed.";
				}
				
		}
		else{
			$month_x = $plus;
			$year_x = $year;
			
		
		
		$query = "INSERT INTO customer(c_name_en, 
									c_home, 
									c_road, 
									c_sangkat, 
									c_khan, 
									c_city, 
									c_phone, 
									duration, 
									total,
									paid,
									day_buy, 
									month_buy, 
									year_buy, 
									day_x, 
									month_x, 
									year_x, 
									staff_id, 
									active)
						VALUES('$c_name_en',
								'$c_home', 
								'$c_road', 
								'$c_sangkat',
								'$c_khan',
								'$c_city',
								'$c_phone',
								'$duration',
								'$total',
								'$paid',
								'$day_buy',
								'$month_buy',
								'$year',
								'$day_buy',
								'$month_x',
								'$year_x',
								'$staff_id',
								'1')";
											   
		
				mysql_query("SET character_set_client=utf8", $con);
				mysql_query("SET character_set_connection=utf8", $con);									   
				mysql_query($query) or die(mysql_error());
				
				
				
				
				$c_id = mysql_insert_id();
					$my_errors = array();
					for($count = 0; $count < sizeof($checked_news); $count++)
					{
						if(!empty($checked_news[$count]))
						{
							$checked_news_insert = mysql_real_escape_string($checked_news[$count]);
							$qty_insert = mysql_real_escape_string($qty[$count]);
							
							$query = "INSERT INTO customer_buy_products(c_id, p_id, qty, p_qty) VALUES('".$c_id."','".$checked_news_insert."','".$qty_insert."','300')";
							if(!mysql_query($query))
							{
								$my_errors[] = $checked_news_insert[$count];
							}
						}
					}
					
					if(sizeof($my_errors) > 0)
					{
						//At least one error occurred
						echo "An error occurred while processing the following news' records: <br/>";
						echo "<ol>";
							for($err = 0; $err < sizeof($my_errors); $err++)
							{
								echo "<li>".$my_errors[$err]."</li>";
							}
						echo "</ol>";
					}
					else
					{
						//Everything Ok
						echo "All recoreds have been successfully processed.";
					}
			
		}
	}
		
		
		
		


	if(isset($_POST['submit_customer']) && $_POST['submit_customer']=="បន្ថែម"){
		add_customer();
		header("location:customer.php");
		
	}
	if(isset($_POST['submit_customer_again']) && $_POST['submit_customer_again']=="បន្ថែម១ទៀត"){
		add_customer();
		header("location:customer_add.php");
	}








?>