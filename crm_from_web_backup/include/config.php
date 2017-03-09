<?php 

// Database Connection Constants

define('DB_HOST', 'localhost');
define('DB_USER', 'kfacomkh_user');
define('DB_PASS', 'JF0gH$J%Dw8J');
define('DB_NAME', 'kfacomkh_crm');

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'wamp' . DS . 'gallery' . DS . 'admin');
defined('INCLUDE_PATH') ? null : define('INCLUDE_PATH', SITE_ROOT.DS. 'upload');
defined('UPLOAD_FOLDER') ? null : define('UPLOAD_FOLDER', 'upload');
defined('USER_FOLDER') ? null : define('USER_FOLDER', 'user');
defined('PROPERTY_FOLDER') ? null : define('PROPERTY_FOLDER', 'property');

defined('PLACEHOLDER_IMAGE') ? null : define('PLACEHOLDER_IMAGE', 'http://placehold.it/100x100&text=image');

 ?>