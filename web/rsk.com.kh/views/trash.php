<?php include('phpfunctions/connection.php');?> 

<h3>អតិថិជន</h3>
<table border="0" width="100%" class="th-view2">
<tr>
	<th width="70%" align="left">បរិយាយ</th>
    <td width="auto"></td>
</tr>

<?php
$query = mysql_query("SELECT * FROM customer WHERE active = '0' ORDER BY c_id DESC");
	while($data=mysql_fetch_array($query)){?>


<tr>
	<td width="70%" align="left">
    	<?php echo $data['c_name_en']; $data['c_id'];?>
    </td>
    <td width="auto" align="right">
    <a href="?mode=restore_customer&id=<?php  echo $data['c_id'];?>">
    <input type="button" value="ត្រលប់ឯកសារ" class="btn-positive" name="restore_customer">
    </a>
    <a href="?mode=delete_customer&id=<?php  echo $data['c_id'];?>">
    <input type="button" value="លុប" class="btn-negative" name="delete_customer" onclick="return confirm('ចុច​ Ok ដើម្បីលុប &#34<?php echo $data['c_name_en'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');">
    </a>
    </td>
</tr>
<?php }?>
</table>

<?php 
	 if(@$_GET['mode'] == 'restore_customer'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE customer SET active = '1' WHERE c_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>
<?php 
	 if(@$_GET['mode'] == 'delete_customer'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "DELETE FROM customer WHERE c_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>


<h3>បុគ្គលិក</h3>
<table border="0" width="100%" class="th-view2">
<tr>
	<th width="70%" align="left">បរិយាយ</th>
    <td width="auto"></td>
</tr>

<?php
$query = mysql_query("SELECT * FROM staff WHERE active = '0' ORDER BY s_id DESC");
	while($data=mysql_fetch_array($query)){?>


<tr>
	<td width="70%" align="left">
    	<?php echo $data['s_name_kh']; $data['s_id'];?>
    </td>
    <td width="auto" align="right">
    <a href="?mode=restore_s&id=<?php  echo $data['s_id'];?>">
    <input type="button" value="ត្រលប់ឯកសារ" class="btn-positive" name="restore_customer">
    </a>
    <a href="?mode=delete_s&id=<?php  echo $data['s_id'];?>">
    <input type="button" value="លុប" class="btn-negative" name="delete_customer" onclick="return confirm('ចុច​ Ok ដើម្បីលុប &#34<?php echo $data['s_name_kh'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');">
    </a>
    </td>
</tr>
<?php }?>
</table>

<?php 
	 if(@$_GET['mode'] == 'restore_s'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE staff SET active = '1' WHERE s_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>
<?php 
	 if(@$_GET['mode'] == 'delete_s'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "DELETE FROM staff WHERE s_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>



<h3>កាសែត</h3>
<table border="0" width="100%" class="th-view2">
<tr>
	<th width="70%" align="left">បរិយាយ</th>
    <td width="auto"></td>
</tr>

<?php
$query = mysql_query("SELECT * FROM products WHERE active = '0' ORDER BY p_id DESC");
	while($data=mysql_fetch_array($query)){?>


<tr>
	<td width="70%" align="left">
    	<?php echo $data['p_name']; $data['p_id'];?>
    </td>
    <td width="auto" align="right">
    <a href="?mode=restore_n&id=<?php  echo $data['p_id'];?>">
    <input type="button" value="ត្រលប់ឯកសារ" class="btn-positive" name="restore_news">
    </a>
    <a href="?mode=delete_n&id=<?php  echo $data['p_id'];?>">
    <input type="button" value="លុប" class="btn-negative" name="delete_news" onclick="return confirm('ចុច​ Ok ដើម្បីលុប &#34<?php echo $data['p_name'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');">
    </a>
    </td>
</tr>
<?php }?>
</table>

<?php 
	 if(@$_GET['mode'] == 'restore_n'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE products SET active = '1' WHERE p_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>
<?php 
	 if(@$_GET['mode'] == 'delete_n'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "DELETE FROM products WHERE p_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>

<h3>តំបន់</h3>
<table border="0" width="100%" class="th-view2">
<tr>
	<th width="70%" align="left">បរិយាយ</th>
    <td width="auto"></td>
</tr>

<?php
$query = mysql_query("SELECT * FROM products WHERE active = '0' ORDER BY p_id DESC");
	while($data=mysql_fetch_array($query)){?>


<tr>
	<td width="70%" align="left">
    	<?php echo $data['p_name']; $data['p_id'];?>
    </td>
    <td width="auto" align="right">
    <a href="?mode=restore_n&id=<?php  echo $data['p_id'];?>">
    <input type="button" value="ត្រលប់ឯកសារ" class="btn-positive" name="restore_news">
    </a>
    <a href="?mode=delete_n&id=<?php  echo $data['p_id'];?>">
    <input type="button" value="លុប" class="btn-negative" name="delete_news" onclick="return confirm('ចុច​ Ok ដើម្បីលុប &#34<?php echo $data['p_name'];?>&#34\nរឺចុច Cancel ដើម្បីចាកចេញ');">
    </a>
    </td>
</tr>
<?php }?>
</table>

<?php 
	 if(@$_GET['mode'] == 'restore_n'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "UPDATE products SET active = '1' WHERE p_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>
<?php 
	 if(@$_GET['mode'] == 'delete_n'){
       if($_GET['id']) {
		$id = mysql_real_escape_string($_GET['id']);
		
		$sql = "DELETE FROM products WHERE p_id = '".$id."'";
		mysql_query($sql) or die(mysql_error());
		header("location:trash.php?restore=ok");
	    }else{}
    }
?>























 
