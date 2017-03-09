<?php require_once("../_configuration/init.php"); ?>
<?php 
if(isset($_POST['submit'])){
	echo $_POST['city'];
	echo $_POST['district'];
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dropbox search</title>
</head>
<body>

<form action="" method="post">
select city:
<select name="city" id="city">
	<option value=""></option>
	<?php 
		$citys = City::find_all_asc();
		foreach($citys as $city):
	 ?>
		<option value="<?php echo $city->id; ?>"><?php echo $city->city_name; ?></option>
	<?php endforeach; ?>
</select>

select district:
<select name="district" id="district">
	<option>Select District</option>
</select>

<input type="submit" name="submit">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>	
<!-- search.js -->
<script>
$(document).ready(function($) {
	$("#city").change(function() {
		var search_id = $(this).val();
		$.ajax({
			url: "search.php",
			method: "post",
			data: {search_id:search_id},
			success: function(data){
				$("#district").html(data);
			}
		})

		// $.post('search.php', {search_id: search_id}, function(data) {
		// 	$("#district").html(data);
		// });
	});
});
</script>
</body>
</html>