<?php

session_start();

//set off all error for security purposes
error_reporting(E_ALL);

date_default_timezone_set("America/Chicago");

define("BASE_URL", "/booprbeeprLTE/");
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/booprbeeprLTE/");


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


// make sure all session variables are set correctly



if (isset($_COOKIE['userID'])){
	$_SESSION['userID'] = $_COOKIE['userID'];
}

if (isset($_SESSION['userID'])){

	$userID = $_SESSION['userID'];

	$user_values = array("username","dogName","profilePic");

	foreach ($user_values as $user_value){

		if (!isset($_SESSION[$user_value])){

			$_SESSION[$user_value] = get_user_data($userID,$user_value);
		}

	}

	if (!isset($_SESSION['boop_table'])){

		$_SESSION['boop_table'] = "bb_" . $userID;
	}

	if ($_SESSION['profilePic'] == null){

		$_SESSION['profilePic'] = "00_default.png";
	}

	try {
		$boop_table = $_SESSION['boop_table'];

		$stmt = $db->query("SELECT * FROM $boop_table");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	} catch( PDOException $e ) {

		return $e->getMessage();
		echo $e;

	}

	if (isset($data[0]["boop_time"]) && isset($data[0]["boop_time"])){

		require(ROOT_PATH . "controllers/database-corrector.php" );

	}

}
