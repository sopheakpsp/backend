    <table width="100%" class="th-view2" id="">
 	 <tr>
        <th width="auto" scope="col">ទីតាំង</th>
        <th width="auto" scope="col">ចាប់ពី</th>
        <th width="auto" scope="col">ដល់</th>
        <th width="auto" scope="col">ផ្សេងៗ</th>
        <th width="auto">កែប្រែ រឺលុប</th>
	</tr>
    
        <?php
            //show records
            $query = mysql_query("SELECT * FROM place WHERE active = '1'");
            
        	    while($data=mysql_fetch_array($query)){?>
	<tr>
    	<td scope="col"><?php echo $data['pl_name'];?></td>
        <td scope="col"><?php echo $data['pl_from'];?></td>
        <td scope="col"><?php echo $data['pl_to'];?></td>
        <td scope="col"><?php echo $data['other'];?></td>
        <td scope="col">
        <a href="place_update.php?update=<?php echo $data['pl_id'];?>">
        <input type="button" name="update_product" value="កែប្រែ" class="btn-positive" />
        </a>
        <a href="?mode=delete&id=<?php  echo $data['pl_id'];?>">
        <input type="button" name="delete_product" value="លុប" class="btn-negative" onclick="return confirm('ចុច​ Ok ដើម្បីលុបប្រភេព &#34<?php echo $data['pl_name'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');"/>
        </a></td>
	</tr>
	<?php }?>
  
  
</table>




















<?php
	 if(@$_GET['mode'] == 'delete'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE place SET active = '0' WHERE pl_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:place.php?del=ok");

       }else{}
    }
?>

