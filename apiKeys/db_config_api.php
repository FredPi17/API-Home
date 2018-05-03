<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 10:11
 */


define('DB_USER', "");
define('DB_PASSWORD', "");
define('DB_DATABASE', "");
define('DB_SERVER', '');

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$db = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);
$db->exec("Set character set utf8");
if($db){
    echo "connexion bdd apiKey ok !";
};
