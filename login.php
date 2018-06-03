<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 31/05/2018
 * Time: 07:53
 */

define("DB_SERVER", "http://raspberrysqlserver.ddns.net");
define("DB_BASE", "apiKey");
define("DB_USER", "fred");
define("DB_PASSWORD", "password");
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.DB_SERVER. ';dbname='.DB_BASE, DB_USER,DB_PASSWORD, $pdo_options);
$bdd->exec("Set character set utf8");

if (isset($_GET['login-submit'])){
    verifUser();
}
elseif(isset($_GET['register-submit'])){
    addUser();
}

function verifUser(){
    global $bdd;
    $requete = $bdd->prepare('SELECT mail, pass, id, username, userKey, dateAdd, secteur FROM apiList WHERE lower(mail) = :mail');
    $requete->execute(array(
        'mail' => $_GET['mail']
    ));

    if($id = $requete->fetch()){
        if ($id['pass'] == $_GET['password']){
            $_SESSION['mail'] = $id['mail'];
            $_SESSION['id'] = $id['id'];
            $_SESSION['username'] = $id['username'];
            $_SESSION['userKey'] = $id['userKey'];
            $_SESSION['dateAdd'] = $id['dateAdd'];
            $_SESSION['secteur'] = $id['secteur'];
        }
        return true;
    }
}

function addUser(){

}

function estConnecte(){
    if (verifUser()){
        return true;
    }
    else{
        return false;
    }
}