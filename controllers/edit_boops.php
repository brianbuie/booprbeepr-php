<?php

require("../config.php");

require(ROOT_PATH . "model/global_load.php");


if (isset($_POST["boop_or_beep"])){

    $boop_or_beep = $_POST["boop_or_beep"];
    $location = $_POST["location"];

    if (isset($_POST['ts'])){ 

        $ts = $_POST['ts'];

    } else {

        if (isset($_POST['day'])) {

            $ts = $_POST['day'] . " " . hour_convert($_POST['hour'],$_POST['am_pm']) . ":" . $_POST['min'] . ":00";

        } else {

            $ts = date('Y-m-d H:i:s');

        }     
    }

    try {

        $results = $db->prepare("INSERT INTO $boop_table(boop_or_beep,location,ts) VALUES (?,?,?)");
        $results->bindParam(1,$boop_or_beep);
        $results->bindParam(2,$location);
        $results->bindParam(3,$ts);
        $results->execute();

    } catch (Exception $e) {

        $_SESSION['error_message'] =  "There was a problem connecting to the database.";
        header('Location:' . BASE_URL);
        exit;
    }

    if($boop_or_beep == "both"){$_SESSION['success_message'] = "A boop and a beep have been added!";}
    else{$_SESSION['success_message'] = "A " . $boop_or_beep . " has been added!";}
}

  
  
if (isset($_POST["remove"])){

    $entry_to_remove = $_POST["remove"];

    try {

        $results = $db->query("SELECT boop_or_beep,location,ts FROM $boop_table WHERE id = '$entry_to_remove'");
    
    }catch( PDOException $e ) {
    
        $_SESSION['error_message'] =  "There was a problem connecting to the database.";
        header('Location:' . BASE_URL);
        exit;
    }
    
    $boop_to_undo = $results->fetchAll(PDO::FETCH_ASSOC);

    try {

        $results = $db->prepare("DELETE FROM $boop_table WHERE id=?");
        $results->bindParam(1,$entry_to_remove);
        $results->execute();

    } catch (Exception $e) {

        $_SESSION['error_message'] =  "There was a problem connecting to the database.";
        header('Location:' . BASE_URL);
        exit;
    }
    
    $_SESSION['success_message'] = "Removed Successfully! " . undo_remove_link($boop_to_undo[0],BASE_URL . 'controllers/edit_boops.php');
}


if (isset($_GET['boop_or_beep'])){

    $boop_or_beep = $_GET["boop_or_beep"];
    $location = $_GET["location"];
    $ts = date('Y-m-d H:i:s');

    try {

        $results = $db->prepare("INSERT INTO $boop_table(boop_or_beep,location,ts) VALUES (?,?,?)");
        $results->bindParam(1,$boop_or_beep);
        $results->bindParam(2,$location);
        $results->bindParam(3,$ts);
        $results->execute();

    } catch (Exception $e) {

        $_SESSION['error_message'] =  "There was a problem connecting to the database.";
        header('Location:' . BASE_URL);
        exit;
    }

    if($boop_or_beep == "both"){$_SESSION['success_message'] = "A boop and a beep have been added!";}
    else{$_SESSION['success_message'] = "A " . $boop_or_beep . " has been added!";}
}



header('Location:' . BASE_URL);











