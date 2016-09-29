<?php 

	if( !isset($_SESSION['userID']) ){
	    
	 	header('Location:' . BASE_URL . "account/login");

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

		if (isset($data[0]["boop_time"]) && isset($data[0]["boop_date"])){

			require(ROOT_PATH . "controllers/database-corrector.php" );

		}

		$boop_table = $_SESSION['boop_table'];

		$profilePic = BASE_URL . "img/user/" . $_SESSION['profilePic'];
		
		$dogName = $_SESSION['dogName'];

	}

