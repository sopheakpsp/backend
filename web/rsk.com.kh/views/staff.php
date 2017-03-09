
    <table width="100%" class="th-view2" id="">
 	 <tr>
        <th width="auto" scope="col">ឈ្មោះ</th>
        <th width="auto" scope="col">ភេទ</th>
        <th width="auto" scope="col">ថ្ងៃខែឆ្នាំកំណើត</th>
        <th width="auto" scope="col">អាសយដ្ឋាន</th>
        <th width="auto" scope="col">លេខទូរស័ព្ទ</th>
        <th width="auto" scope="col">តំបន់ត្រូវចុះ</th>
        <th width="auto">កែប្រែ រឺលុប</th>
	</tr>
    
        <?php
            //show records
            $query = mysqli_query($connection,"SELECT * FROM staff WHERE active = '1' ORDER BY s_id DESC");
            
        	    while($data=mysqli_fetch_array($query)){?>
	<tr>
        <td scope="col">
		<a href="staff_detail.php?detail=<?php echo $data['s_id'];?>" class="a">
		<?php echo $data['s_name_kh'];?>
        </a>
        </td>
        <td scope="col"><?php echo $data['sex'];?> </td>
        <td scope="col" align="left"><?php echo $data['day_birth'].'-'.$data['month_birth'].'-'.$data['year_birth'];?> </td>
        <td scope="col" align="left"><?php echo 'ផ្ទះលេខ'.$data['c_home'].' ផ្លូវ'.$data['c_road'].' '.$data['c_pum'].' សង្កាត់'.$data['c_sangkat'].' ខណ្ឌ'.$data['c_khan'];?></td>
        <td scope="col" align="left"><?php echo $data['s_phone'];?></td>
        <td scope="col" align="center"><?php echo $data['place'];?></td>    
        <td scope="col" align="left">
        <a href="staff_update.php?update=<?php echo $data['s_id'];?>"><input type="button" name="" value="កែប្រែ" class="btn-positive" /></a>
        <a href="?mode=delete&id=<?php  echo $data['s_id'];?>">
        <input type="button" name="delete_staff" value="លុប" class="btn-negative" onclick="return confirm('ចុច​ Ok ដើម្បីលុបប្រភេព &#34<?php echo $data['s_name_kh'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');"/>
        </a>
        
        </td>
	</tr>
	<?php }?>
  
</table>
<br/>





<?php
	if(@$_GET['mode'] == 'delete'){
       if($_GET['id'])
	   {
			$id = mysql_real_escape_string($_GET['id']);
			$sql = "UPDATE staff SET active = '0' WHERE s_id = '".$id."'";
			mysql_query($sql) or die(mysql_error());
			header("location:staff.php?del=ok");
       }else{}
    }

	$mess = isset($_REQUEST['mess'])?$_REQUEST['mess']:null;
		if($mess==1)
		{
			echo "<div id='object' class='message'> 
						<img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
			
						<p style='float:left;' >ការបន្ថែមបានជោគជ័យ!</p>
				</div>";
		}
	
	
	
	$mess = isset($_REQUEST['update'])?$_REQUEST['update']:null;
		if($mess=="1")
		{
			echo "<div id='object' class='message'> 
					<img id='close_message' style=' float:left; cursor:pointer'  src='img/success.png' />
	    
		  			<p style='float:left;' >ការកែប្រែបានជោគជ័យ</p>
         			</div>";
		}
	
	
	
	
	$mess = isset($_REQUEST['del'])?$_REQUEST['del']:null;
		if($mess=="ok")
		{
			echo "<div id='object' class='message_del'> 
			  			<img id='close_message' style=' float:left; cursor:pointer'  src='img/deleted_trush.png' />
			
			  			<p style='float:left;' >ឯកសារត្រូវបានបញ្ជូនទៅកាន់ធុងឯកសារបណ្តោះអាសន្ន</p>
			 	</div>";
		}

?>

