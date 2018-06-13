<?php
/**
 * Created by PhpStorm.
 * User: fredericpinaud
 * Date: 04/06/2018
 * Time: 16:56
 */
session_start();
include_once('login.php');

if (isset($_POST['change-password'])) {
    verifPassword();
} elseif (isset($_POST['modify'])) {
    modifyData();
}

function verifPassword()
{
    global $bdd;
    if (isset($_POST['old-pass']) != '' && isset($_POST['new-pass']) != '' && isset($_POST['conf-pass']) != '') {
        $requete = $bdd->prepare('SELECT pass FROM apiList WHERE mail = :mail');
        $requete->execute(array(
            'mail' => $_SESSION['mail']
        ));
        if ($id = $requete->fetch()) {
            if ($id['pass'] == $_POST['old-pass']) {
                changePassword($_POST['new-pass'], $_POST['conf-pass']);
            }
            else{
                header('Location:profil.php?error=Mot%20de%20passe%20actuel%20mauvais');
                die();
            }
        }
        else{
            header('Location:profil.php?error=Mauvais%20mot%20de%20passe');
            die();
        }
    }
    else{
        header('Location:profil.php?error=Il%20manque%20des%20informations%20pour%20changer%20le%20mot%20de%20passe');
        die();
    }
}

function changePassword($newpass, $confpass){
    global $bdd;
    if ($newpass == $confpass && $newpass != '' && $confpass != '') {
        $p_requete2 = $bdd->prepare('UPDATE `apiList` SET `pass` = :pass WHERE `id` = :id');
        $p_requete2->execute(array(
            'pass' => $newpass,
            'id' => $_SESSION['id']));
        header('Location:profil.php?success=Changement%20du%20mot%20de%20passe%20ok');
        die();
    } else {
        header('Location:profil.php?error=Les%20mots%20de%20passe%20ne%20sont%20pas%20identiques%20ou%20vides');
        die();
    }
}


function modifyData()
{
    global $bdd;
    $requete = $bdd->prepare('UPDATE apiList SET username = :username, name = :name, mail = :mail WHERE id = :id');
    if($requete->execute(array(
        'username' => $_POST['username'],
        'name' => $_POST['name'],
        'mail' => $_POST['email'],
        'id' => $_SESSION['id']
    ))){
        header('Location:profil.php?success=Modification%20des%20infos%20ok\nLes infos seront changées apres reconnexion');
        die();
    }
    else{
        header('Location:profil.php?error=Erreur%20de%20modification%20des%20infos');
        die();
    };

}