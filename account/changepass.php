<?php 

	require("../config.php");

	if( isset( $_POST['changePass'] ) ) {
		$usr = new Users;
		$usr->storeFormValues( $_POST );

		if( $usr->userLogin( $db ) == true) {

			if( $_POST['newPass'] == $_POST['conpassword'] ) {

				if( $usr->changePass( $db ) == true) {

				    $usr->password = $usr->newPass;
				    $_SESSION['userID'] = $usr->get_user_info( $db , "userID" );
				    $_SESSION['username'] = $usr->username;
				    $_SESSION['boop_table'] = "bb_" . $_SESSION['userID'];
				    setcookie("userID", $_SESSION['userID'], time()+60*60);
				    $_SESSION['success_message'] = "Password changed.";
			  
			  	} else {
			    	$_SESSION['error_message'] = "There was an error changing your password.";
			  	}

			} else {
				$_SESSION['error_message'] = "The new password fields didn't match."; 
			}

		} else {
			$_SESSION['error_message'] = "Your old password was incorrect.";
		}

	}

	header('Location:' . BASE_URL . 'account');