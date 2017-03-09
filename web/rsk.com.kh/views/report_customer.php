<?php
	$year = date('Y');
	if(isset($_GET['year']))
	{
		$year = $_GET['year'];
	}
?>
<form name="report" action="report_customer.php" method="get">  
  <select name="year" class="select">
    <option selected="selected" value="<?php echo date('Y');?>">ជ្រើសរើស</option>
    <option value="2011">2011</option>
    <?php
		
    	for($i=2012; $i<=date('Y'); $i++)
		{?>
			<option value="<?php echo $i?>"><?php echo $i;?></option>
		<?php }?>
	
    
  </select>
  <input type="submit" value="បញ្ជូន" class="btn-positive">
</form>  

<table width="100%" class="th-view3" id="">
<tr>
        <th width="auto" align="center" scope="col">ខែ</th>
        <th width="auto" align="center" scope="col">អតិថិជនសរុប</th>
        <th width="auto" align="center" scope="col">បង់រួចចំនួន</th>
        <th width="auto" align="center" scope="col">មិនទាន់បង់ចំនួន</th>
        <th width="auto" align="center" scope="col">ប្រាក់អថិថិជនត្រូវបង់</th>
        <th width="auto" align="center">ប្រាក់អតិថិជនបានបង់</th>
        <th width="auto" align="center">ប្រាក់អតិថិជនជំពាក់</th>
    </tr>
    
        
	<tr>
    	<th align="center" scope="col">០១</th>
        <td align="center" scope="col">
		<?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '1' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?>
        </td>
        <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '1' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
        <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '1' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
        <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '1' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?> រៀល</td>
        <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '1' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
          រៀល
        
      </td>
        <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '1' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
        រៀល</td>
	</tr>
	<tr>
	  <th align="center" scope="col">០២</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '2' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '2' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '2' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '2' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '2' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '2' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៣</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '3' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '3' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '3' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '3' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '3' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '3' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៤</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '4' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '4' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '4' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '4' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '4' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '4' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៥</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '5' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '5' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '5' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '5' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '5' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '5' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៦</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '6' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '6' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '6' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '6' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '6' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '6' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៧</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '7' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '7' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '7' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '7' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '7' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '7' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៨</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '8' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '8' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '8' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '8' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?> 
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '8' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '8' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">០៩</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '9' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col">
	  <?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '9' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?>
      </td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '9' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col">
	  <?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '9' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      
      ​រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '9' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
​រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '9' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
​រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">១០</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '10' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '10' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '10' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '10' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '10' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '10' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">១១</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '11' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '11' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '11' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '11' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '11' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '11' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">១២</th>
	  <td align="center" scope="col"><?php
			$m1 = mysql_query("SELECT * FROM customer WHERE month_buy = '12' AND year_buy = '$year' AND active = '1'");
		    $m1_count = mysql_num_rows($m1);
			echo $m1_count;
        ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND month_buy = '12' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND month_buy = '12' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE month_buy = '12' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE month_buy = '12' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
	  <td align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE month_buy = '12' AND year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo $row['SUM(total)']-$row['SUM(paid)'];
		}
	  ?>
      រៀល</td>
  </tr>
	<tr>
	  <th align="center" scope="col">សរុប</th>
	  <th align="center" scope="col">
	  <?php
		$m1 = mysql_query("SELECT * FROM customer WHERE year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?>
      </th>
	  <th align="center" scope="col">
	  <?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='ជំពាក់' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?>
      </th>
	  <th align="center" scope="col"><?php
		$m1 = mysql_query("SELECT * FROM customer WHERE pay_status='រួចរាល់' AND year_buy = '$year' AND active = '1'");
		$m1_count = mysql_num_rows($m1);
		echo $m1_count;
      ?></th>
	  <th align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(total) FROM customer WHERE year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo number_format($row['SUM(total)']);
		}
	  ?>
      រៀល</th>
	  <th align="right" scope="col"><?php
	  	$result = mysql_query("SELECT SUM(paid) FROM customer WHERE year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo number_format($row['SUM(paid)']);
		}
	  ?>
      រៀល</th>
	  <th align="right" scope="col">
	  <a href="customer_late.php" class="a">
	  <?php
	  	$result = mysql_query("SELECT SUM(total), SUM(paid) FROM customer WHERE year_buy = '$year' AND active='1'");
		while($row = mysql_fetch_array($result)){
			echo number_format($row['SUM(total)']-$row['SUM(paid)']);
		}
	  ?>
      រៀល
      </a></th>
  </tr>
	<?php //}?>
  
  
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

