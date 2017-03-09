<?php include('phpfunctions/connection.php');?>

    <table width="100%" class="th-view2" id="">
 	 <tr>
     	
        <th width="auto" align="left" scope="col">លេខអត្តសញ្ញាណប័ណ្ឌ</th>
        <th width="auto" scope="col">ឈ្មោះ</th>
        <th width="auto" scope="col">លេខទូរស័ព្ទ</th>
        <th width="auto" scope="col">បិត/បើកសិទ្ធ</th>

	</tr>
    
        <?php

            $query = mysql_query("SELECT * FROM user WHERE position = '2'");
            
        	    while($data=mysql_fetch_array($query)){?>
	<tr>
    	<td align="left" scope="col"><a href="place_update.php?update=<?php echo $data['u_number'];?>"><img src='img/edit.ico'/><?php echo $data['u_number'];?></a></td>
    	<td scope="col"><?php echo $data['u_name'];?></td>
        <td scope="col" align="left"><?php echo $data['u_phone'];?></td>
        <td scope="col" align="left"><?php echo $data['active'];?></td>
        
	</tr>
	<?php }?>
  
  
</table>




















