<?php
	require("../config.php");

	unset($_SESSION['userID']);
	unset($_SESSION['boop_table']);
	unset($_SESSION['dogName']);
	unset($_SESSION['profilePic']);
	session_destroy();
	session_write_close();
	setcookie("userID", "00", time()-90000);
	header('Location:' . BASE_URL);
	die;