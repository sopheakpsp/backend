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
            $query = mysqli_query($connection,"SELECT * FROM customer WHERE active = '1' ORDER BY c_id DESC");
            
        	    while($data=mysqli_fetch_array($query)){?>
	<tr>
    	<td>
		<input type="hidden" name="id" value="<?php echo $data['c_id'];?>">
		<?php $detail=$data['c_id']?>
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
            $query_staff = mysqli_query($connection,$select_staff) or die(mysql_error());
            $data_staff = mysqli_fetch_array($query_staff);
            ?>
            <a href="staff_detail.php?detail=<?php echo $staff?>" class="a">
            <?php echo $data_staff['s_name_kh'];?>
            </a>
        </td>
        <td>
        <?php
        	if($data['total']==$data['paid']){
				echo "រួចរាល់";}
			else{
				echo "ជំពាក់";}
		?>
        </td>
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

function redirect($location){
    header('location:{$location}'.php);
}

 ?>




<?php
	 if(@$_GET['mode'] == 'delete'){
       if($_GET['id']) {
		$id = mysqli_real_escape_string($connection, $_GET['id']);
		
		$sql = "UPDATE customer SET active = '0' WHERE c_id = '".$id."'";
		mysqli_query($connection, $sql);
		header('Location:/customer.php?del=ok');


       }else{}
    }
?>


