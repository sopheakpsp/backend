<?php
	$find = isset($_REQUEST['find'])?$_REQUEST['find']:null;
		if(isset($find))
		{
			include("phpfunctions/connection.php");?>
<table width="100%" class="th-view2">
    <tr>
    	<th><u>អតិថិជន</u></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
    	<th>ឈ្មោះ</th>
        <th>អាសយដ្ឋាន</th>
        <th>លេខទូរស៍ព្ទ</th>
    </tr>
<?php
	$sql_query = "SELECT * FROM customer WHERE c_name_en LIKE '%$find%'";
	$result = mysql_query($sql_query, $con);
		while($row = mysql_fetch_array($result)){?> 
    <tr>
   	  <td>
        <a href="customer_detail.php?detail=<?php echo $row['c_id'];?>" class="a">
        <?php echo $row['c_name_en'];?>
        </a>
      </td>
      <td><?php echo "ផ្ទះលេខ".$row['c_home']." ផ្លូវ".$row['c_road']." សង្កាត់".$row['c_sangkat']." ខណ្ឌ".$row['c_khan']." ក្រុង".$row['c_city'];?></td>
      <td>
      	<?php echo $row['c_phone']?>
      </td>
    </tr>
    <?php }?>
    
    
    <tr>
      <th>&nbsp;</th>
      <th></th>
      <th></th>
    </tr>
    <tr>
    <th><u>បុគ្គលិក</u></th>
    <th></th>
    <th></th>
    </tr>
    <tr>
    	<th>ឈ្មោះ</th>
        <th>អាសយដ្ឋាន</th>
        <th>លេខទូរស៍ព្ទ</th>
    </tr>
<?php
	$sql_query = "SELECT * FROM staff WHERE s_name_kh LIKE '%$find%'";
	$result = mysql_query($sql_query, $con);
		while($row = mysql_fetch_array($result)){?> 
    <tr>
   	  <td>
        <a href="staff_detail.php?detail=<?php echo $row['s_id'];?>" class="a">
        <?php echo $row['s_name_kh'];?>
        </a>
      </td>
      <td><?php echo 'ផ្ទះលេខ'.$row['c_home'].' ផ្លូវ'.$row['c_road'].' '.$row['c_pum'].' សង្កាត់'.$row['c_sangkat'].' ខណ្ឌ'.$row['c_khan'].' ក្រុង'.$row['c_city'];?></td>
      <td>
      	<?php echo $row['s_phone']?>
      </td>
    </tr>
    <?php }?>
    
    
</table>






        





<?php } //end first?>
		

	
	
	

