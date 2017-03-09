<?php
	if(!isset($_GET['year']))
	{
		$_GET['year'] = date('Y');	
	}
	include("phpfunctions/connection.php");		
	$title = "របាយការណ៍";
	$content_title = "របាយការណ៍អតិថិជនប្រចាំឆ្នាំ ".$_GET['year'];
	$page = "report_customer";
	include ("main/layout.php");
?>
	
	
