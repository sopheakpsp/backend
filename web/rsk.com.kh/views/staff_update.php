<?php	
	include("phpfunctions/connection.php");
	$update = isset($_REQUEST['update'])?$_REQUEST['update']:null;
	$select = "SELECT * FROM staff WHERE s_id='$update'";
		mysql_query("SET character_set_client=utf8", $con);
		mysql_query("SET character_set_connection=utf8", $con);	
	$sql = mysql_query($select, $con) or die(mysql_error());

    $data=mysql_fetch_array($sql);
	
	
?>

<form action="staff_update.php" method="post">

<table border="0" class="">
	<tr>
    	<td width="150" rowspan="17" valign="top"><!--<div style="width:150px; height:187px; border:1px solid #999; border-radius:10px;"></div>--></td>
    	
        <td width="172" align="right">លេខអត្តសញ្ញាណប័ណ្ណ</td>
      <td width="269">
      <input type="hidden" name="id" value="<?php echo $data['s_id'];?>">
      <input type="text" name="s_number" value="<?php echo $data['s_number'];?>" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ឈ្មោះ</th>
      <td><input type="text" name="s_name_kh" value="<?php echo $data['s_name_kh'];?>" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ឈ្មោះជាអង់គ្លេស</th>
      <td><input type="text" name="s_name_en" value="<?php echo $data['s_name_en'];?>" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ថ្ងៃខែឆ្នាំកំណើត</th>
        <td>
        	<select name="day_birth" class="select" style="width:50px">
            	<option value="<?php echo $data['day_birth'];?>" selected="selected"><?php echo $data['day_birth'];?></option>
				<?php 
					for ($i=1; $i<=31; $i++){
					
				?>
                <option value="<?php echo $i;?>"><?php echo $i;}?></option>
            </select>
            
            <select name="month_birth" class="select" style="width:55px">
            	<option value="<?php echo $data['month_birth'];?>" selected="selected"><?php echo $data['month_birth'];?></option>
            	<?php 
					for ($i=1; $i<=12; $i++){
					
				?>
                <option value="<?php echo $i;?>"><?php echo $i;}?></option>
            </select>
            
            <select name="year_birth" class="select" style="width:100px">
            	<option value="<?php echo $data['year_birth'];?>" selected="selected"><?php echo $data['year_birth'];?></option>
            	<?php 
					for ($i=1970; $i<=2013; $i++){
					
				?>
                <option value="<?php echo $i;?>"><?php echo $i;}?></option>
            </select>
            
                
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ភេទ</th>
      <td><select name="sex" class="select">
    	<option value="<?php echo $data['sex'];?>"><?php echo $data['sex'];?></option>
        <option value="ប្រុស">ប្រុស</option>
        <option value="ស្រី">ស្រី</option></select></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right" valign="top"><u>ទីកន្លែងកំណើត</u></th>
        <td></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right" valign="top">ភូមិ/សង្កាត់</th>
        <td><input type="text" name="b_sangkat" value="<?php echo $data['b_sangkat'];?>" class="txtbox">
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right" valign="top">ឃុំ/ខណ្ឌ</th>
        <td>
        	<input type="text" name="b_khan" value="<?php echo $data['b_khan'];?>" class="txtbox">
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right" valign="top">ខេត្ត/ក្រុង</th>
        <td>
           <input type="text" name="b_city" value="<?php echo $data['b_city'];?>" class="txtbox">
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">លេខទូរស័ព្ទ</th>
      <td><input type="text" name="s_phone" value="<?php echo $data['s_phone'];?>" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right"><u>អាស័យដ្ឋានបច្ចុប្បន្ន</u></th>
        <td></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ផ្ទះលេខ</th>
        <td><input type="text" name="l_home" value="<?php echo $data['c_home'];?>" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ផ្លូវ</th>
        <td><input type="text" name="l_road" value="<?php echo $data['c_road'];?>" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">សង្កាត់</th>
        <td><input type="text" name="l_sangkat" value="<?php echo $data['c_sangkat'];?>" class="txtbox" /></td>
       <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ខណ្ឌ</th>
        <td><input type="text" name="l_khan" value="<?php echo $data['c_khan'];?>" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ក្រុង</th>
        <td><input type="text" name="l_city" value="<?php echo $data['c_city'];?>" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ថ្ងៃចូលធ្វើការ</th>
        <td><select name="day_start" class="select" style="width:50px">
          <option value="<?php echo $data['day_start'];?>" selected="selected"><?php echo $data['day_start'];?></option>
          <?php 
					for ($i=1; $i<=31; $i++){
					
				?>
          <option value="<?php echo $i;?>"><?php echo $i;}?></option>
        </select>
          <select name="month_start" class="select" style="width:55px">
            <option value="<?php echo $data['month_start'];?>" selected="selected"><?php echo $data['month_start'];?></option>
            <?php 
					for ($i=1; $i<=12; $i++){
					
				?>
            <option value="<?php echo $i;?>"><?php echo $i;}?></option>
          </select>
          <select name="year_start" class="select" style="width:100px">
            <option value="<?php echo $data['year_start'];?>" selected="selected"><?php echo $data['year_start'];?></option>
            <?php 
					for ($i=1970; $i<=2013; $i++){
					
				?>
            <option value="<?php echo $i;?>"><?php echo $i;}?></option>
        </select></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    
</table>

<h3>មុខងារ</h3>
<table width="1287" border="0">
<tr>
	<td width="113" rowspan="3"></th>
	<td width="139" align="right">មុខងារ
    </th>
    <td width="338"><select name="s_position" class="select">
    	<option value="<?php echo $data['position'];?>"><?php echo $data['position'];?></option>
      <option value="អ្នកចែកកាសែត">អ្នកចែកកាសែត</option>
      <option value="អ្នកប្រមូលលុយ">អ្នកប្រមូលលុយ</option>
    </select></td>
    <td width="679" style="position:relative"></td> 
</tr>
<tr>
	<td width="139" height="89" align="right" valign="top">តំបន់ត្រូវចុះ</th>
    <td>
		<select name="s_place_work" class="select" style="width:auto">
        	<option value="<?php echo $data['place'];?>"><?php echo $data['place'];?></option>
        	<?php
				$sql = "SELECT * FROM place";
				$query = mysql_query($sql) or die(mysql_error());
				while($data = mysql_fetch_array($query)){
					
					
			?>
        	<option value="<?php echo $data['pl_name'];?>"><?php echo $data['pl_name'].'<u> ចាប់ពី </u>'.$data['pl_from'].'<span style="color:#FFF"> ដល់ </span>'.$data['pl_to'];}?></option>
        </select>    
    </td>
    <td width="679" style="position:relative"></td> 
</tr>
<tr>
	<td width="139" align="right" valign="top">&nbsp;</th>
    <td valign="top"><input type="submit"​ name="update_staff" value="កែប្រែ" class="btn-positive" />
      
    <a href="staff.php"><input type="button"​ name="cancel_staff" value="មិនកែប្រែ" class="btn-negative" /></a></td>
    <td width="679" style="position:relative"></td> 
</tr>

</table>
</form>

<?php

	if(isset($_POST['update_staff']) && $_POST['update_staff']=="កែប្រែ"){
		
		$id = $_POST['id'];
		$s_number = trim($_POST['s_number']);
		$s_name_kh = trim($_POST['s_name_kh']);
		$s_name_en = trim($_POST['s_name_en']);
		$day_birth = trim($_POST['day_birth']);
		$month_birth = trim($_POST['month_birth']);
		$year_birth = trim($_POST['year_birth']);
		$sex = trim($_POST['sex']);
		$b_sangkat = trim($_POST['b_sangkat']);
		$b_khan = trim($_POST['b_khan']);
		$b_city = trim($_POST['b_city']);
		$s_phone = trim($_POST['s_phone']);
		$l_home = trim($_POST['l_home']);
		$l_road = trim($_POST['l_road']);
		$l_sangkat = trim($_POST['l_sangkat']);
		$l_khan = trim($_POST['l_khan']);
		$l_city = trim($_POST['l_city']);
		
		$day_start = trim($_POST['day_start']);
		$month_start = trim($_POST['month_start']);
		$year_start = trim($_POST['year_start']);
		
		
		$s_position = trim($_POST['s_position']);
		@$s_place_work = $_POST['s_place_work'];
//		echo $id;
//		echo $s_number;
		
		
	$update = "UPDATE staff SET s_number = '$s_number',
									s_name_kh = '$s_name_kh',
									s_name_en = '$s_name_en',
									sex = '$sex', 
									day_birth = '$day_birth',
									month_birth = '$month_birth',
									year_birth = '$year_birth',
									s_phone = '$s_phone',
									b_sangkat = '$b_sangkat',
									b_khan = '$b_khan',
									b_city = '$b_city',
									c_home = '$l_home',
									c_road = '$l_road',
									c_sangkat = '$l_sangkat',
									c_khan = '$l_khan',
									c_city = '$l_city',
									day_start = '$day_start',
									month_start = '$month_start',
									year_start = '$year_start',
									position = '$s_position',
									place = '$s_place_work',
									datetime = now()
									WHERE s_id = '$id'";
	mysql_query("SET character_set_client=utf8", $con);
	mysql_query("SET character_set_connection=utf8", $con);	
	mysql_query($update) or die(mysql_error());
	header("location: staff.php?update=1");
	}else{ echo mysql_error();}
?>

