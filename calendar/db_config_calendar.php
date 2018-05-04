<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 09:25
 */

define('DB_USER', "fred");
define('DB_PASSWORD', "password");
define('DB_DATABASE', "calendrier");
define('DB_SERVER', 'raspberrysqlserver.ddns.net');


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $pdo_options);
$bdd->exec("Set character set utf8");
