<?php
class MyDestructableClass {
   function __construct() {
       print "In constructor<br>";
       $this->name = "MyDestructableClass<br>";
   }

   function __destruct() {
       print "Destroying " . $this->name . "<br>";
   }
}

$obj = new MyDestructableClass();

?>