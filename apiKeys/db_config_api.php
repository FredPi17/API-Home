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

function VerifApi()
{
    $response = array();
    global $db;
    if (isset($_GET['apiKey']) && $_GET['apiKey'] != '') {
        $apiKey = $_GET['apiKey'];
        $requestApi = $db->prepare("SELECT userKey from apiList WHERE userKey = :apiKey");
        $requestApi->execute(array('apiKey' => $apiKey));
        if($result = $requestApi->fetch()) {
            if ($result['userKey'] == $apiKey) {
                return 1;
            }
        }
        else{
            $response['success'] = 0;
            $response['message'] = 'Invalid key';
            echo json_encode($response);
            return 0;
        }

    } else {
        $response['success'] = 0;
        $response['message'] = 'Key missing';
        echo json_encode($response);
        return 0;
    }
}