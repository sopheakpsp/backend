<?php
	$detail = isset($_REQUEST['detail'])?$_REQUEST['detail']:null;
	if(isset($detail)){
	include('phpfunctions/connection.php');
	
	$sql = "SELECT * FROM customer WHERE c_id = '$detail'";
	$query = mysqli_query($connection, $sql) or die(mysql_error());
	$data = mysqli_fetch_array($query);

?>


<table width="100%" class="th-view2">
  <tr>
    <th width="21%" scope="row"><strong>ឈ្មោះអតិថិជន រឺស្ថានបន</strong></th>
    <td width="72%" align="left"><?php echo $data['c_name_en'];?></td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>អាសយដ្ឋាន</strong></th>
    <td align="left"><?php echo "ផ្ទះលេខ".$data['c_home']." ផ្លូវ".$data['c_road']." សង្កាត់".$data['c_sangkat']." ខណ្ឌ".$data['c_khan']." ក្រុង".$data['c_city'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>លេខទូរស៍ព្ទ</strong></th>
    <td align="left"><?php echo $data['c_phone'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row" valign="top"><strong>ជាវកាសែត</strong></th>
    <td align="left">
    			<ul type="circle">
    <?php
	    $query_pruducts = mysqli_query($connection,"SELECT * FROM products INNER JOIN customer_buy_products ON products.p_id = customer_buy_products.p_id AND customer_buy_products.c_id = '$detail'");
            	
        	    while($data_products=mysqli_fetch_array($query_pruducts)){?>
    			
                	<li><?php echo $data_products['p_name']." (".$data_products['qty']." ច្បាប់)";}?></li>
                </ul>
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>រយះពេល</strong></th>
    <td align="left"><?php echo $data['duration'];?> ខែ</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>ចាប់ពី</strong></th>
    <td align="left"><?php echo $data['day_buy'];?>-<?php echo $data['month_buy'];?>-<?php echo $data['year_buy'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>ដល់</strong></th>
    <td align="left"><?php echo $data['day_x'];?>-<?php echo $data['month_x'];?>-<?php echo $data['year_x'];?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>តំលៃសរុប</strong></th>
    <td align="left"><?php echo $data['total'];?> រៀល</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>កក់</strong></th>
    <td align="left"><?php echo $data['paid'];?> រៀល</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>ជំពាក់</strong></th>
    <td align="left"><?php echo $data['total']-$data['paid'];?> រៀល</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope="row"><strong>អ្នកដាក់កាសែត</strong></th>
    <td align="left">
    
    <?php
	$staff = $data['staff_id'];
    $select_staff = "SELECT * FROM staff WHERE s_id = '$staff'";
	$query_staff = mysqli_query($connection,$select_staff) or die(mysql_error());
	$data_staff = mysqli_fetch_array($query_staff);
	?>
    <a href="staff_detail.php?detail=<?php echo $staff?>" class="a">
    <?php echo $data_staff['s_name_kh'];?>
	</a>	
    
    
    </td>
    <td>&nbsp;</td>
  </tr>
  
</table>
<?php } ?>