<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 31/05/2018
 * Time: 07:53
 */
session_start();
$bdd = new PDO('mysql:host=raspberrysqlserver.ddns.net;dbname=apiKey', 'fred', 'password');

if (isset($_GET['login-submit'])){
    echo $_GET['mail'];
    verifUser();

}
elseif(isset($_GET['register-submit'])){
    addUser();
}
elseif(isset($_POST['logout'])){
    deconnexion();
}

function verifUser()
{
    global $bdd;
    $requete = $bdd->prepare('SELECT mail, pass, id, username, userKey, dateAdd, secteur FROM apiList WHERE mail = :mail');
    $requete->execute(array(
        'mail' => $_GET['mail']
    ));

    if ($id = $requete->fetch()) {
        if ($id['pass'] == $_GET['password']) {
            $_SESSION['mail'] = $id['mail'];
            $_SESSION['id'] = $id['id'];
            $_SESSION['username'] = $id['username'];
            $_SESSION['userKey'] = $id['userKey'];
            $_SESSION['dateAdd'] = $id['dateAdd'];
            $_SESSION['secteur'] = $id['secteur'];
            header('Location:index.php');
            die();
        }
        else{
            header('Location:connexion.php?invalid');
            die();
        }
    }
}

function addUser(){

}

function estConnecte(){
    if (isset($_SESSION['id'])){
        return true;
    }
    else{
        return false;
    }
}

function deconnexion(){
    unset($_SESSION['id']);
    unset($_SESSION['mail']);
    unset($_SESSION['username']);
    unset($_SESSION['userKey']);
    unset($_SESSION['dateAdd']);
    unset($_SESSION['secteur']);
    header('Location: index.php');
    die();
}