<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>jQuery IU Essential</title>
		<link rel="stylesheet" href="css/jquery-ui.min.css">
	</head>
	<body>
		<div id="tabs">
			<ul>
				<li>
					<h3><a href="#one">one</a></h3>
				</li>
				<li>
					<h3><a href="#two">two</a></h3>
				</li>
				<li>
					<h3><a href="#three">three</a></h3>
				</li>
				<li>
					<h3><a href="remote_tabs.html">remote tabs</a></h3>
				</li>
			</ul>
			<div id="one">this is panel 1</div>
			<div id="two">this is panel 2</div>
			<div id="three">this is panel 3</div>
		</div>
		<button id="changeAnimate">Change animate</button>
		<button id="reload">Reload</button>
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script>
			$(function(){
				$("#tabs").tabs();
				$("#changeAnimate").on("click", function(){
					$("#tabs").tabs("option", "hide", "explode");
				});
				$("#reload").on("click", function(){
					$("#tabs").tabs("load", 3);
				});
			});
		</script>
	</body>
</html>