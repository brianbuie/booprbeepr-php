<?php

session_start();

//set off all error for security purposes
error_reporting(E_ALL);

date_default_timezone_set("America/Chicago");

define("BASE_URL", "/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/");


define("DB_HOST", "localhost");
define("DB_NAME", "boopr_beepr");
define("DB_PORT", "3306");
define("DB_USER", "localuser");
define("DB_PASS", "password");

try {
	$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$db->exec("SET NAMES 'utf8'"); 
} catch (Exception $e) {
	$e->getTraceAsString();
	echo "There was a problem connecting to the database;";
	exit;
}


//include the classes and functions 

require(ROOT_PATH . "classes/user.php" );
require(ROOT_PATH . "model/model-functions.php");
require(ROOT_PATH . "view/view-functions.php");


