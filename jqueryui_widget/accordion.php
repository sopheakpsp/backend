<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>jQuery IU Essential</title>
	<link rel="stylesheet" href="css/jquery-ui.min.css">
</head>
<body>
	<div id="accordion">
		<h3>One</h3>
		<div>This is panel 1</div>
		<h3>Two</h3>
		<div>This is panel 2</div>
		<h3>Three</h3>
		<div>This is panel 3</div>
	</div>
	<input type="button" id="disable" value="disable">
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script>
	$(function(){
		$("#accordion").accordion({
			active: 1, //0,1,2
			//animate: "easeOutBounce", //true, false, 100
			animate: {
				easing: "linear",
				duration: 100,
				down: {
					easing: "easeOutBounce",
					duration: 300
				}
			},
			collapsible: true
		});

		$("#disable").on("click", function(){
			$("#accordion").accordion("disable");
		});
	});
</script>
</body>
</html>