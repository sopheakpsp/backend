<table width="100%" class="th-view2" id="">
 	 <tr>
     	<th width="auto">ឈ្មោះអតិថិជន រឺស្ថាបន</th>
        <th width="auto">អាសយដ្ថាន</th>
        <th width="auto">លេខទូរស៍ព្ទ</th>
        <th width="auto">បុគ្គលិកដាក់ឱ្យ</th>
        <th width="auto">ការបង់ប្រាក់</th>
        <th width="auto" style="color:blue">ថ្ងៃជាវ</th>
        <th width="auto" style="color:red">ថ្ងៃផុត</th>
        <th width="auto" style="text-align:right">កែប្រែ រឺលុប</th>
	</tr>
    
        <?php
            //show records
            $query = mysql_query("SELECT * FROM customer WHERE active = '1' AND pay_status = 'ជំពាក់' ORDER BY c_id DESC");
            
        	    while($data=mysql_fetch_array($query)){?>
	<tr>
    	<td><?php $detail=$data['c_id']?>
		<a href="customer_detail.php?detail=<?php echo $detail?>" class="a">
		<?php echo $data['c_name_en'];?>
        </a>
        </td>
        <td>...សង្កាត់ <?php echo $data['c_sangkat'];?></td>
        <td><?php echo $data['c_phone'];?></td>
        <td>
			<?php
            $staff = $data['staff_id'];
            $select_staff = "SELECT * FROM staff WHERE s_id = '$staff'";
            $query_staff = mysql_query($select_staff) or die(mysql_error());
            $data_staff = mysql_fetch_array($query_staff);
            ?>
            <a href="staff_detail.php?detail=<?php echo $staff?>" class="a">
            <?php echo $data_staff['s_name_kh'];?>
            </a>
        </td>
        <td><?php echo $data['pay_status'];?></td>
        <td><?php echo $data['day_buy'];?>-<?php echo $data['month_buy'];?>-<?php echo $data['year_buy'];?></td>
        <td><?php echo $data['day_x'];?>-<?php echo $data['month_x'];?>-<?php echo $data['year_x'];?></td>
        <td align="right">
        <a href="customer_update.php?update=<?php echo $data['c_id'];?>">
        <input type="button" name="update_product" value="កែប្រែ" class="btn-positive" />
        </a>
        <a href="?mode=delete&id=<?php  echo $data['c_id'];?>">
        <input type="button" name="delete_product" value="លុប" class="btn-negative" onclick="return confirm('ចុច​ Ok ដើម្បីលុបប្រភេព &#34<?php echo $data['c_name_en'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');"/>
        </a>
        </td>
	</tr>
	<?php }?>
  
  
</table>




















<?php
	 if(@$_GET['mode'] == 'delete'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE customer SET active = '0' WHERE c_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:customer.php?del=ok");
//		$select = "SELECT * FROM products WHERE p_id = '". $id ."'";
//		$sql = mysql_query($select, $con) or die(mysql_error());
//		$data=mysql_fetch_array($sql);
//		$name = $data['p_name'];
//		$price_one = $data['price_one'];
//		$price_three = $data['price_three'];
//		$price_six = $data['price_six'];
//		$price_year = $data['price_year'];
//		$other = $data['other'];
//		
//		$insert_into_trash = "INSERT INTO products_trash(p_name, price_one, price_three, price_six, price_year, other,datetime)
//										VALUES('$name', '$price_one', '$price_three', '$price_six', '$price_year', '$other', now())";							   		mysql_query($insert_into_trash) or die(mysql_error());
//		
//		       
//          $query = "DELETE FROM products WHERE p_id='" . $id . "'";
//
//          mysql_query($query);
//		  header("location:news_kind.php?del=ok");
       }else{}
    }
?>


