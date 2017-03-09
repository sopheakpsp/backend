<?php

    //get the function
    //include_once ('library/function.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        $statement = "`staff`";
?>

<div style="margin:0 auto; height:50px">
<?php
	echo pagination($statement,$limit,$page);
?>
</div>


    <table width="100%" class="altrowstable" id="alternatecolor">
 	 <tr>
     	<th width="32">លំអិត</th>
        <th width="220" scope="col" align="left">លេខអត្តសញ្ញាណប័ណ្ឌ</th>
        <th width="179" scope="col" align="left">ឈ្មោះ</th>
        <th width="174" scope="col" align="left">ភេទ</th>
        <th width="188" scope="col">ថ្ងៃខែឆ្នាំកំណើត</th>
        <th width="185" scope="col">លេខទូរស័ព្ទ</th>
        <th width="217" scope="col">ទីកន្លែងត្រូវចុះ</th>
        <th width="75">កែប្រែ</th>
        <th width="75">លុប</th>
	</tr>
    
        <?php
            //show records
            $query = mysql_query("SELECT * FROM {$statement} WHERE active = '1' ORDER BY s_id DESC LIMIT {$startpoint} , {$limit}");
            
        	    while($data=mysql_fetch_array($query)){?>
	<tr>
    	<td scope="col" align="center"><a href="staff_detail.php?detail=<?php echo $data['s_id'];?>"><img src="img/detail.png" style="margin:0"></a></td>
    	<td scope="col"><a href="#"><?php echo $data['s_number'];?></a></td>
        <td scope="col"><?php echo $data['s_name_kh'];?> </td>
        <td scope="col"><?php echo $data['sex'];?> </td>
        <td scope="col" align="center"><?php echo $data['day_birth'].'-'.$data['month_birth'].'-'.$data['year_birth'];?> </td>
        <td scope="col" align="center"><?php echo $data['s_phone'];?></td>
        <td scope="col" align="center"><?php echo $data['place'];?></td>
        <td scope="col" align="center">
        
        <a href="staff_update.php?update=<?php echo $data['s_id'];?>"><img src='img/edit.ico'/></a>
        
        </td>
        
        <td scope="col" align="center">
        
        <a href="?mode=delete&id=<?php  echo $data['s_id'];?>"><img src='img/delete.ico' name="delete_product" onclick="return confirm('ចុច​ Ok ដើម្បីលុបប្រភេព &#34<?php echo $data['s_name_kh'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');"/></a>
        
        </td>
	</tr>
	<?php }?>
  
</table>
<br/>
<div style="margin:0 auto; height:50px">
<?php
	echo pagination($statement,$limit,$page);
?>
</div>




<?php
	 if(@$_GET['mode'] == 'delete'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE staff SET active = '0' WHERE s_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:staff.php?del=ok");
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

