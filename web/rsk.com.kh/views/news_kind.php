    <table width="100%" class="th-view2" id="">
 	 <tr>
        <th width="auto" scope="col">បរិយាយ</th>
        <th width="auto" scope="col">តំលៃ/១ខែ</th>
        <th width="auto" scope="col">តំលៃ/៣ខែ</th>
        <th width="auto" scope="col">តំលៃ/៦ខែ</th>
        <th width="auto" scope="col">តំលៃ/១ឆ្នាំ</th>
        <th width="auto" scope="col">ផ្សេងៗ</th>
        <th width="auto">កែប្រែ​ រឺលុប</th>
	</tr>
    
        <?php
            //show records
            $query = mysql_query("SELECT * FROM products WHERE active = '1'");
            
        	    while($data=mysql_fetch_array($query)){?>
	<tr>
    	<td scope="col"><?php echo $data['p_name'];?></td>
        <td scope="col"><?php echo $data['price_one'];?> រៀល</td>
        <td scope="col"><?php echo $data['price_three'];?> រៀល</td>
        <td scope="col"><?php echo $data['price_six'];?> រៀល</td>
        <td scope="col"><?php echo $data['price_year']?> រៀល</td>
        <td scope="col"><?php echo $data['other'];?></td>
        <td scope="col">
        <a href="news_update.php?update=<?php echo $data['p_id'];?>">
        <input type="button" name="update_product" value="កែប្រែ" class="btn-positive" />
        </a>
        <a href="?mode=delete&id=<?php  echo $data['p_id'];?>">
        <input type="button" name="delete_product" value="លុប" class="btn-negative" onclick="return confirm('ចុច​ Ok ដើម្បីលុបប្រភេព &#34<?php echo $data['p_name'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');"/>
        </a></td>
	</tr>
	<?php }?>
  
  
</table>




















<?php
	 if(@$_GET['mode'] == 'delete'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE products SET active = '0' WHERE p_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:news_kind.php?del=ok");

       }else{}
    }
?>

