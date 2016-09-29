<?php

require("../config.php");

if (isset($_POST["changeDogName"])){

    $userID = $_POST["userID"];
    $dogName = $_POST["dogName"];
    
    try {
        $results = $db->prepare("UPDATE users SET dogName = ? WHERE userID = ? LIMIT 1");

        $results->bindParam(1,$dogName);
        $results->bindParam(2,$userID);
        $results->execute();

    } catch (Exception $e) {
        $_SESSION['error_message'] = "There was a problem connecting to the database.";
    }

    if(!isset($_SESSION['error_message'])){
        
        $_SESSION['success_message'] = "Name changed successfully!";
        $_SESSION['dogName'] = $dogName;
    }

}

if (isset($_SESSION['referal'])){

    header('Location:' . BASE_URL . $_SESSION['referal']);

}

// header('Location:' . BASE_URL);

