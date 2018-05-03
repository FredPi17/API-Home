<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 09:48
 */


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>API - CREATE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="container">
        <div class="row justify-content-md-center ">
            <form method="get">
                <label>Date</label>
                <input type="date" name="date"><br>
                <label>Nom utilisateur</label>
                <input type="text" name="user"><br>
                <label>Secteur</label>
                <input type="text" name="secteur"><br>
                <input type="submit" name="go">
            </form>


<?php
require_once('apiKeys/db_config_api.php');

$username = '';
$secteur = '';
$date = '';
$response = array();
if(isset($_GET["go"])) {
    $username = $_GET['user'];
    $secteur = $_GET['secteur'];
    $date = $_GET['date'];

    // création de la clé SHA1: secteur/user/date
    $str = $_GET['secteur'] . $_GET['user'] . $_GET['date'];
    echo $apiKey = sha1($str);
    echo $date;


    $request = $db->prepare("INSERT INTO apiList(apiKey, username, secteur, dateAdd) VALUES (:apiKey, :username, :secteur, :dateAdd)");
    $request->execute(array(
            'apiKey' => $apiKey,
        'username' => $username,
        'secteur' => $secteur,
        'dateAdd' => $date
    ));
    if($request){
        echo "insertion bdd apiKey ok ";
        header('Location: create.php');
        die();
    }
}
?>
        </div>
    </div>
</div>
</body>
</html>