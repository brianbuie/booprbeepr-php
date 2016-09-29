<?php 

	require("../config.php");

	if( !isset( $_POST['login'])) {
		$_SESSION['error_message'] = "There was a problem with the information you entered.";
	}

	$usr = new Users;
	$usr->storeFormValues( $_POST );

	if( $usr->userLogin( $db ) ) {
	  $_SESSION['userID'] = $usr->get_user_info( $db , 'userID');
	  $_SESSION['username'] = $usr->username;
	  $_SESSION['boop_table'] = "bb_" . $_SESSION['userID'];
	  $_SESSION['dogName'] = $usr->get_user_info( $db , 'dogName');
	  $_SESSION['profilePic'] = $usr->get_user_info( $db , 'profilePic');
	  

	  if (isset($_POST['remember-me'])){
	    setcookie("userID", $_SESSION['userID'], time()+365*24*60*60);
	  } else {
	  setcookie("userID", $_SESSION['userID'], time()+60*60);
	  }
	} else {
	  $_SESSION['username'] = $_POST['username'];
	  $_SESSION['error_message'] = "Incorrect Password"; 
	}

	if( !isset( $_SESSION['error_message'])) {

		header('Location:' . BASE_URL);

	} else {

	header('Location:' . BASE_URL . 'account/login');

	}

