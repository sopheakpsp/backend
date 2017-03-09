<?php
class BaseClass {
   function __construct() {
       print "In BaseClass constructor<br>";
   }
}

class SubClass extends BaseClass {
   function __construct() {
       parent::__construct(); //use method of parent class
       print "In SubClass constructor<br>";
   }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();
?>