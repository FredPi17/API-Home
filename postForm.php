<?php
/**
 * Created by PhpStorm.
 * User: fredericpinaud
 * Date: 23/05/2018
 * Time: 19:41
 */
function verifInfo(){
    if(isset($_GET['sujet_1']) && isset($_GET['sujet_2']) && isset($_GET['message']) && isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['email'])){
        if($_GET['sujet_1'] != null | $_GET['sujet_1'] == '' && $_GET['sujet_2'] != null | $_GET['sujet_2'] == '' && $_GET['message'] != null | $_GET['message'] == '' && $_GET['prenom'] != null | $_GET['prenom'] == '' && $_GET['nom'] != null | $_GET['nom'] == '' && $_GET['email'] != null | $_GET['email'] == '' ){
            echo 'ok';
            return 1;
        }
        else{
            echo 'pas ok 1';
            return 0;
        }
    }
    else{
        echo 'pas ok 2';
        return 0;
    }
}

if(verifInfo()){
    $to = 'fpinaud17@gmail.com';
    //User info (DO NOT EDIT!)
    $name = stripslashes($_GET["nom"]); //sender's name
    $email = stripslashes($_GET["email"]); //sender's email
    //The subject
    $subject  = "Le sujet :"; //The default subject. Will appear by default in all messages. Change this if you want.
    $subject .= stripslashes($_GET["sujet_1"]); // the subject
    $subject_precision = $_GET['sujet_2'];
    //The message you will receive in your mailbox
    //Each parts are commented to help you understand what it does exaclty.
    //YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
    $msg  = "From : $name \r\n";  //add sender's name to the message
    $msg .= "e-Mail : $email \r\n"; //add sender's website to the message
    $msg .= "$subject \r\n"; //add subject to the message (optional! It will be displayed in the header anyway)
    $msg .= "Précision sur le sujet: $subject_precision\r\n\n";
    $msg .= "---Message--- \r\n\n".stripslashes($_GET['message'])."\r\n\n";  //the message itself
    //Extras: User info (Optional!)
    //Delete this part if you don't need it
    //Display user information such as Ip address and browsers information...
    $msg .= "---Contact information--- \r\n\n"; //Title
    $msg .= "Son IP : ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
    $msg .= "Navigateur : ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
    $msg .= "Page : ".$_SERVER["HTTP_REFERER"]; //Referrer
    // END Extras
    if  (mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n")){
        header("Location:contact.php?success");
        die();
    }else{
        header("Location:contact.php?erreur");
        die();
    }
}