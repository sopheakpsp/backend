<?php 

## while loop is check condition first

$count =1;

while($count <= 10){					//while(0) always False, while(1) always True
	echo "I am the best $count <br>";
	$count++;
}


## do while is do once and then check condition

$do = 1;
do{
	echo "I am the best $do <br>";
	$do++;
}
while($do<=0);


 ?>