<?php

 class Users {
	 public $username = null;
	 public $password = null;
	 public $newPass = null;
	 public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
	 
	 public function __construct( $data = array() ) {
		 if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) );
		 if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
		 if( isset( $data['newPass'] ) ) $this->newPass = stripslashes( strip_tags( $data['newPass'] ) );
	 }
	 
	 public function storeFormValues( $params ) {
		//store the parameters
		$this->__construct( $params ); 
	 }
	 
	 public function userLogin( $db ) {
		 $success = false;
		 try{
			$sql = "SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1";
			
			$stmt = $db->prepare( $sql );
			$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();
			
			$valid = $stmt->fetchColumn();
			
			if( $valid ) {
				$success = true;
			}
			
			$con = null;
			return $success;
		 }catch (PDOException $e) {
			 echo $e->getMessage();
			 return $success;
		 }
	 }
	 
	 public function register( $db ) {
		$correct = false;
			try {
				$sql = "INSERT INTO users(username, password) VALUES(:username, :password)";
				
				$stmt = $db->prepare( $sql );
				$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
				$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
				$stmt->execute();
			}catch( PDOException $e ) {
				return $e->getMessage();
				echo "There was a problem connecting to the database.";
			}

			try {
				$sql = "SELECT userID FROM users WHERE username = :username AND password = :password LIMIT 1";
				
				$stmt = $db->prepare( $sql );
				$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
				$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
				$stmt->execute();
			}catch( PDOException $e ) {
				return $e->getMessage();
				echo "There was a problem connecting to the database.";
			}
		   
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

			
		    $userID = $results[0]["userID"];
		    $table_prefix = "bb_";
		    $table_name = $table_prefix . $userID;

			try {
				$sql = "CREATE table $table_name (`boop_or_beep` varchar(10) DEFAULT NULL, `location` varchar(10) DEFAULT NULL, `ts` TIMESTAMP DEFAULT CURRENT_TIMESTAMP, `id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`id`))";
				$db->exec($sql);
			}catch( PDOException $e ) {
				return $e->getMessage();
				echo "There was a problem connecting to the database.";
			}

	 }

	 public function changePass( $db ) {
			try {
				$sql = "UPDATE users SET password = :newPass WHERE username = :username AND password = :password LIMIT 1";
				
				$stmt = $db->prepare( $sql );
				$stmt->bindValue( "newPass", hash("sha256", $this->newPass . $this->salt), PDO::PARAM_STR );
				$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
				$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
				$stmt->execute();
				$correct = true;
			}catch( PDOException $e ) {
				return $e->getMessage();
				echo "There was a problem connecting to the database.";
				$correct = false;

			}

			return $correct;
	 }

	 public function get_user_info( $db , $colname ) {
	 	try {
			$sql = "SELECT $colname FROM users WHERE username = :username AND password = :password LIMIT 1";
			
			$stmt = $db->prepare( $sql );
			$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();
		}catch( PDOException $e ) {
			return $e->getMessage();
			echo "There was a problem connecting to the database.";
		}
	    
	    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    $refined = $results[0][$colname];
	    return $refined;

	 }
 }
 
?>