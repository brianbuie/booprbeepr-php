<?php

require("../config.php");

if( isset( $_POST['register'] ) ) {

    $taken = true;

    try {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
            
        $stmt = $db->prepare( $sql );
        $stmt->bindValue( "username", $_POST['username'], PDO::PARAM_STR );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if( ! $row ){
            $taken = false;
        }

    }catch( PDOException $e ) {

        return $e->getMessage();
        $_SESSION['error_message'] = "There was a problem connecting to the database.";
        header('Location:' . BASE_URL . 'account/register');
    
    }

    if ($taken == true){

        $_SESSION['error_message'] = "That username is already taken.";
        header('Location:' . BASE_URL . 'account/register');

    } else {

        $_SESSION['username'] = $_POST['username'];
        $usr = new Users;
        $usr->storeFormValues( $_POST );

        if( $_POST['password'] == $_POST['conpassword'] ) {
            $usr->register( $db );
            $_SESSION['userID'] = $usr->get_user_info( $db , 'userID' );
            $_SESSION['username'] = $usr->username;
            $_SESSION['boop_table'] = "bb_" . $_SESSION['userID'];
            
            if (isset($_POST['remember-me'])){
                setcookie("userID", $_SESSION['userID'], time()+365*24*60*60);
            } else {
                setcookie("userID", $_SESSION['userID'], time()+60*60);
            } 
            
        } else {

            $_SESSION['error_message'] = "Your passwords didn't match!"; 

        }
    }
}

if ( isset( $_POST['register'] ) && !isset( $_SESSION['error_message'] ) ) {
    $name = trim($_POST["username"]);

    if( stripos($name,'Content-Type:') !== FALSE ){

        $_SESSION['error_message'] = "There was a problem with the information you entered.";

    }

    require(ROOT_PATH . "classes/mailer.php");
    $mail = new PHPMailer();

    if (!isset($_SESSION['error_message'])){
        $email_body = "registered " . date("Y-M-d h:i a");

        $mail = new PHPMailer();
        //Set who the message is to be sent from
        $mail->SetFrom("info@booprbeepr.com","BooprBeepr");
        //Set who the message is to be sent to
        $address = "brianjamesbuie@gmail.com";
        $mail->AddAddress($address, 'admin');
        //Set the subject line
        $mail->Subject = $name;
        //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
        $mail->MsgHTML($email_body);

        //Send the message, check for errors
        if($mail->Send()) {
            header( 'Location:' . BASE_URL );
            exit;
        } 
        else {
              
            $_SESSION['error_message'] = "There was a problem registering. Please try again.";

        }
    }
}

header('Location:' . BASE_URL . 'account/register'); 


