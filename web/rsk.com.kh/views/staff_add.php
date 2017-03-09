<form action="staff_add.php" method="post">

<table border="0" class="">
	<tr>
    	<td width="150" rowspan="17" valign="top"></td>
    	<td width="172" align="right">លេខអត្តសញ្ញាណប័ណ្ណ</th>
      <td width="269"><input type="text" name="s_number" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ឈ្មោះ</th>
      <td><input type="text" name="s_name_kh" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ឈ្មោះជាអង់គ្លេស</th>
      <td><input type="text" name="s_name_en" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ថ្ងៃខែឆ្នាំកំណើត</th>
        <td>
        	<select name="day_birth" class="select" style="width:50px">
            	<option value="" selected="selected">ថ្ងៃ</option>
				<?php 
					for ($i=1; $i<=31; $i++){
					
				?>
                <option value="<?php echo $i;?>"><?php echo $i;}?></option>
            </select>
            
            <select name="month_birth" class="select" style="width:55px">
            	<option value="" selected="selected">ខែ</option>
            	<?php 
					for ($i=1; $i<=12; $i++){
					
				?>
                <option value="<?php echo $i;?>"><?php echo $i;}?></option>
            </select>
            
            <select name="year_birth" class="select" style="width:100px">
            	<option value="" selected="selected">ឆ្នាំ</option>
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
    	<option value="0">សូមជ្រើសរើស</option>
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
        <td><input type="text" name="b_sangkat" class="txtbox">
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right" valign="top">ឃុំ/ខណ្ឌ</th>
        <td>
        	<input type="text" name="b_khan" class="txtbox">
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right" valign="top">ខេត្ត/ក្រុង</th>
        <td>
           <input type="text" name="b_city" class="txtbox">
        </td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">លេខទូរស័ព្ទ</th>
      <td><input type="text" name="s_phone" class="txtbox"></td>
      <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right"><u>អាស័យដ្ឋានបច្ចុប្បន្ន</u></th>
        <td></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ផ្ទះលេខ</th>
        <td><input type="text" name="l_home" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ផ្លូវ</th>
        <td><input type="text" name="l_road" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">សង្កាត់</th>
        <td><input type="text" name="l_sangkat" class="txtbox" /></td>
       <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ខណ្ឌ</th>
        <td><input type="text" name="l_khan" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ក្រុង</th>
        <td><input type="text" name="l_city" class="txtbox" /></td>
        <td width="680" style="position:relative"></td> 
    </tr>
    <tr>
    	<td align="right">ថ្ងៃចូលធ្វើការ</th>
        <td><select name="day_start" class="select" style="width:50px">
          <option value="" selected="selected">ថ្ងៃ</option>
          <?php 
					for ($i=1; $i<=31; $i++){
					
				?>
          <option value="<?php echo $i;?>"><?php echo $i;}?></option>
        </select>
          <select name="month_start" class="select" style="width:55px">
            <option value="" selected="selected">ខែ</option>
            <?php 
					for ($i=1; $i<=12; $i++){
					
				?>
            <option value="<?php echo $i;?>"><?php echo $i;}?></option>
          </select>
          <select name="year_start" class="select" style="width:100px">
            <option value="" selected="selected">ឆ្នាំ</option>
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
	<td width="125" rowspan="3"></th>
	<td width="127" align="right">មុខងារ
	  </th>
    <td width="338"><select name="s_position" class="select">
    	<option value="0">សូមជ្រើសរើស</option>
      <option value="អ្នកចែកកាសែត">អ្នកចែកកាសែត</option>
      <option value="អ្នកប្រមូលលុយ">អ្នកប្រមូលលុយ</option>
    </select></td>
    <td width="679" style="position:relative"></td> 
</tr>
<tr>
	<td width="127" height="89" align="right" valign="top">តំបន់ត្រូវចុះ</th>
    <td>
		<select name="s_place_work" class="select" style="width:auto">
        	<?php
				include('phpfunctions/connection.php');
				$sql = "SELECT * FROM place";
				
				mysql_query("SET character_set_client=utf8", $con);
				mysql_query("SET character_set_connection=utf8", $con);	
				$query = mysql_query($sql) or die(mysql_error());
				while($data = mysql_fetch_array($query)){
					
					
			?>
        	<option value="<?php echo $data['pl_name'];?>"><?php echo $data['pl_name'].'<u> ចាប់ពី </u>'.$data['pl_from'].'<span style="color:#FFF"> ដល់ </span>'.$data['pl_to'];}?></option>
        </select>    
    </td>
    <td width="679" style="position:relative"></td> 
</tr>
<tr>
	<td width="127" align="right" valign="top">&nbsp;</th>
    <td valign="top"><input type="submit"​ name="submit_staff" value="បន្ថែម" class="btn-positive" />
      <input type="submit"​ name="submit_staff_again" value="បន្ថែម១ទៀត" class="btn-positive" />
    <a href="staff.php"><input type="button"​ name="cancel_staff" value="មិនបន្ថែម" class="btn-negative" /></a></td>
    <td width="679" style="position:relative"></td> 
</tr>

</table>





</form>