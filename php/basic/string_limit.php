<?php $string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.";
if (strlen($string) > 25) {
$trimstring = substr($string, 0, 25). ' <a href="#">readmore...</a>';
} else {
$trimstring = $string;
}
echo $trimstring;
//Output : Lorem Ipsum is simply dum [readmore...][1]
?>