<?php 

if(isset($_GET['tag'])){
	$tag = preg_replace("#[^a-zA-Z0-9_]#", '', $_GET['tag']);
	echo '<h1>' . $tag . '</h1>';
}

