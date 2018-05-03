<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 02/05/18
 * Time: 22:32
 */
define("DB_SERVER", "");
define("DB_BASE", "");
define("DB_USER", "");
define("DB_PASSWORD", "");
/**
 *\ $bdd permet la connexion à la base de données de supdecom
 *\ $bdd2 permet la connexion à la base de données de idrac
 ***/
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_BASE, DB_USER, DB_PASSWORD, $pdo_options);
$bdd->exec("Set character set utf8");
