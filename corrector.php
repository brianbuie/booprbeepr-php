<?php

require("config.php");

// GLOBAL MODEL CODE //

require(ROOT_PATH . "model/global_load.php");


// PAGE SPECIFIC MODEL CODE //

require(ROOT_PATH . "model/get_boops.php");

require(ROOT_PATH . "model/count_boops.php");

$pageTitle = "Dashboard";

$stylesheets = array(
    "bootstrap.min",
    "font-awesome.min",
    "ionicons.min",
    "AdminLTE",
    "main",
);

$scripts = array(
	"bootstrap.min",
	"AdminLTE/app",
	"plugins/moment/moment",
);

$bodyClass = "skin-blue";

	try {

		$root = new PDO('mysql:host=localhost;dbname=boopr_beepr;charset=utf8', 'root');
		$root->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$root->exec("SET NAMES 'utf8'");

		$stmt = $root->query("SELECT * FROM $boop_table");
   		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

	} catch( PDOException $e ) {

		return $e->getMessage();
		echo $e;

	}

	if (isset($data[0]["boop_time"]) && isset($data[0]["boop_time"])){

		if (!isset($data[0]["ts"])){

			try{
				$add = $root->exec("ALTER TABLE $boop_table ADD COLUMN ts TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
			} catch( PDOException $e ) {

			return $e->getTraceAsString();
			echo $e;

			}

		}

		foreach($data as $new_data){

			$ts = $new_data['boop_date'] . ' ' . $new_data['boop_time'];
			$id = $new_data['id'];

			try{
				$update = $root->exec("UPDATE $boop_table SET ts = '$ts' WHERE id = '$id'");
			} catch( PDOException $e ) {

				return $e->getTraceAsString();
				echo $e;

			}
		}

		try{
				
			$alter = $root->exec("ALTER TABLE $boop_table DROP boop_time");
			
			} catch( PDOException $e ) {

				return $e->getTraceAsString();
				echo $e;

		}

		try{
				
			$alter = $root->exec("ALTER TABLE $boop_table DROP boop_date");
			
			} catch( PDOException $e ) {

				return $e->getTraceAsString();
				echo $e;

		}

	}


// DOCUMENT START //


require(ROOT_PATH . "view/doc-head.php");


// TOP OF PAGE DEBUG AREA //


require(ROOT_PATH . "view/footer.php"); ?>