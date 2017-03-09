<?php	
	
	// Receive the Data from Client
	$data = $_REQUEST;
	$name = $data['planet'];
	
	// Result Array
	$result = array();
	
	// Data Array
	$planet_details = array( 
		array( 'name' => 'Mercury' , 'order_no' => '1' , 'no_of_days_in_year' => '87' ),
		array( 'name' => 'Venus' , 'order_no' => '2' , 'no_of_days_in_year' => '224' ),
		array( 'name' => 'Earth' , 'order_no' => '3' , 'no_of_days_in_year' => '365' ),
		array( 'name' => 'Mars' , 'order_no' => '4' , 'no_of_days_in_year' => '686' ),
		array( 'name' => 'Jupiter' , 'order_no' => '5' , 'no_of_days_in_year' => '4332' ),
		array( 'name' => 'Saturn' , 'order_no' => '6' , 'no_of_days_in_year' => '10755' ),
		array( 'name' => 'Uranus' , 'order_no' => '7' , 'no_of_days_in_year' => '30687' ),
		array( 'name' => 'Neptune' , 'order_no' => '8' , 'no_of_days_in_year' => '60190' )
	);
	
	for( $count = 0 ; $count < count( $planet_details ) ; $count++ ) {
		if( stripos( $planet_details[$count]['name'] , $name ) !== false ) {
			array_push( $result , $planet_details[$count] );
		}
	}
	
	// Return Response as JSON
	echo json_encode( $result );
	
	/*
	Note:
	stripos = find position of one string in another 

	mixed stripos ( string $haystack , string $needle [, int $offset = 0 ] )
	Find the numeric position of the first occurrence of needle in the haystack string.

	Unlike the strpos(), stripos() is case-insensitive.

	Parameters
	~~~~~~~~~~

	haystack:
	The string to search in.

	needle:
	Note that the needle may be a string of one or more characters.

	If needle is not a string, it is converted to an integer and applied as the ordinal value of a character.

	offset
	If specified, search will start this number of characters counted from the beginning of the string. Unlike strrpos() and strripos(), the offset cannot be negative.
	 */
	
	/*
	Example #1 array_push() example

	<?php
	$stack = array("orange", "banana");
	array_push($stack, "apple", "raspberry");
	print_r($stack);
	?>
	
	The above example will output:

	Array
	(
	    [0] => orange
	    [1] => banana
	    [2] => apple
	    [3] => raspberry
	)
	 */ 
?>