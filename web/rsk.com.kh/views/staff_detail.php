<?php
	$detail = isset($_REQUEST['detail'])?$_REQUEST['detail']:null;
	if(isset($detail)){
	include('phpfunctions/connection.php');
	
	$sql = "SELECT * FROM staff WHERE s_id = '$detail'";
	$query = mysqli_query($connection,$sql) or die(mysql_error());
	$data = mysqli_fetch_array($query);
	
	
	
	
?>

<table width="100%" class="th-view2">
	<tr>
    	<th width="20%">លេខអត្តសញ្ញាណប័ណ្ណ</th>
        <td width="80%"><?php echo $data['s_number'];?></td>
    </tr>
    <tr>
    	<th>ឈ្មោះ</th>
        <td><?php echo $data['s_name_kh'];?></td>
    </tr>
    <tr>
    	<th>ឈ្មោះជាអង់គ្លេស</th>
        <td><?php echo $data['s_name_en'];?></td>
    </tr>
    <tr>
    	<th>ថ្ងៃខែឆ្នាំកំណើត</th>
        <td><?php echo $data['day_birth'].'-'.$data['month_birth'].'-'.$data['year_birth'];?></td>
    </tr>
    <tr>
    	<th>ភេទ</th>
        <td><?php echo $data['sex'];?></td>
    </tr>
    <tr>
    	<th>ទីកន្លែងកំណើត</th>
        <td><?php echo $data['b_sangkat'].'-'.$data['b_khan'].'-'.$data['b_city'];?></td>
    </tr>
    <tr>
    	<th>លេខទូរស័ព្ទ</th>
        <td><?php echo $data['s_phone'];?></td>
    </tr>
    <tr>
    	<th>អាស័យដ្ឋានបច្ចុប្បន្ន</th>
        <td><?php echo 'ផ្ទះលេខ'.$data['c_home'].' ផ្លូវ'.$data['c_road'].' '.$data['c_pum'].' សង្កាត់'.$data['c_sangkat'].' ខណ្ឌ'.$data['c_khan'].' ក្រុង'.$data['c_city'];?></td>
    </tr>
    
    <tr>
    	<th>ថ្ងៃចូលធ្វើការ</th>
        <td><?php echo $data['day_start'].$data['month_start'].$data['year_start'];?></td>
    </tr>
    
    <tr>
        <th>មុខងារ
        </th>
        <td><?php echo $data['position'];?></td>
    </tr>
    <tr>
        <th valign="top">តំបន់ត្រូវចុះ
        </th>
        <td><?php echo $data['place'];?></td>
    </tr>
    <tr>
        <th valign="top">អតិថិជន
        </th>
        <td valign="top">
            <ul type="circle">
    <?php
	    $query_customer = mysqli_query($connection,"SELECT * FROM customer INNER JOIN staff ON customer.staff_id = staff.s_id AND customer.staff_id = '$detail'");
            	
        	    while($data_customer=mysqli_fetch_array($query_customer)){?>
    				<?php $detail=$data_customer['c_id']?>
                <li><a href="customer_detail.php?detail=<?php echo $detail?>"><?php echo $data_customer['c_name_en'];}?></a></li>
            </ul>
        </td>
    </tr>
    
    </table>
<?php } ?>




