<?php

try {

		$root = $db;
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