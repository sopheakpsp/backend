<?php 

// title - make PHP hashtag system by using regular expression

function convertHashtagToLink($string){
	$expression = "/#+([a-zA-Z0-9_]+)/";
	$string = preg_replace($expression, '<a href="hashtag.php?tag=$1">$0</a>', $string);
	return $string;
}

$string = "#PHP means Hypertext Prepocessor";
$string = convertHashtagToLink($string);
echo $string;

 ?>