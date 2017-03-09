<?php 

/**
* 
*/
class Cars 
{
	
	function gretting()
	{
		
	}
}

$methods = get_class_methods('Cars');

foreach ($methods as $method) {
	echo $method;
}




 ?>