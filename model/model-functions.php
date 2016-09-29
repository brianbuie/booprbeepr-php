<?php

	function hour_convert($hour,$am_pm){
		$converted = $hour;
		if ($hour == 12){
			if ($am_pm == "am"){
				$converted = 00;
			}
			else{
				$converted = 12;
			}
		}
		else{
			if ($am_pm == "pm"){
				$converted += 12;
			}
		}
		return $converted;
	}

	function count_instances($db,$boop_table,$stipulation){

		try {
			if ($stipulation != null){
				$results = $db->query("SELECT COUNT(*) FROM $boop_table WHERE $stipulation");
			} else {
				$results = $db->query("SELECT COUNT(*) FROM $boop_table");
			}
		}catch( PDOException $e ) {
			return $e->getMessage();
			echo "There was a problem connecting to the database.";
		}
		$raw_results = $results->fetchAll(PDO::FETCH_ASSOC);

		$refined_results = $raw_results[0]["COUNT(*)"];

		return $refined_results;

	}

	function get_all_boops($db,$boop_table,$stipulation){

		try {
			if ($stipulation != null){
				$results = $db->query("SELECT * FROM $boop_table WHERE $stipulation ORDER BY ts DESC");
			} else {
				$results = $db->query("SELECT * FROM $boop_table ORDER BY ts DESC");
			}
		}catch( PDOException $e ) {
			return $e->getMessage();
			echo "There was a problem connecting to the database.";
		}

		$raw_results = $results->fetchAll(PDO::FETCH_ASSOC);

		return $raw_results;

	}

	function boop_table_query($db, $statement){

		try {

			$results = $db->query($statement);

		}catch( PDOException $e ) {
			return $e->getMessage();
			echo "There was a problem connecting to the database.";
		}

		$raw_results = $results->fetchAll(PDO::FETCH_ASSOC);

		return $raw_results;

	}

	function get_user_data($userID,$column){
		
		$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		try {

			$results = $db->query("SELECT $column FROM users WHERE userID = $userID");

		}catch( PDOException $e ) {

			return $e->getMessage();
			echo "There was a problem connecting to the database.";
		
		}
		$raw_results = $results->fetchAll(PDO::FETCH_ASSOC);

		$refined_results = $raw_results[0][$column];

		return $refined_results;

	}