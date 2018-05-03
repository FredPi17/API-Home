

<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 09:25
 */
require_once('connection_config.php');


if(isset($_GET['date'])){
    $date = $_GET['date'];

    $response = array();
    $response['events'] = array();

    $result = $bdd->prepare("SELECT * FROM events WHERE start LIKE '$date%'");
    $result->execute();

    if(!empty($result)){
        while($resultData = $result->fetch()){
            $events = array();
            $events['title'] = $resultData["title"];
            $events['id'] = $resultData['id'];
            $events['start'] = $resultData["start"];
            $events['end'] = $resultData["end"];
            $events['idUtilisateur'] = $resultData["idUtilisateur"];

            $response['success'] = 1;

            array_push($response['events'], $events);
        }
    }
    else{
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

    }
    echo json_encode($response);
}

else if(isset($_GET['year'])){
    $year = $_GET['year'];

    $response = array();
    $response['events'] = array();

    $result = $bdd->prepare("SELECT * FROM events WHERE start LIKE '$year%'");
    $result->execute();

    if(!empty($result)){
        while($resultData = $result->fetch()){
            $events = array();
            $events['title'] = $resultData["title"];
            $events['id'] = $resultData['id'];
            $events['start'] = $resultData["start"];
            $events['end'] = $resultData["end"];
            $events['idUtilisateur'] = $resultData["idUtilisateur"];

            $response['success'] = 1;

            array_push($response['events'], $events);
        }
    }
    else{
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

    }
    echo json_encode($response);
}

else if(isset($_GET['monthyear'])){
    $yearmonth = $_GET['monthyear'];

    $response = array();
    $response['events'] = array();

    $result = $bdd->prepare("SELECT * FROM events WHERE start LIKE '$yearmonth%'");
    $result->execute();

    if(!empty($result)){
        while($resultData = $result->fetch()){
            $events = array();
            $events['title'] = $resultData["title"];
            $events['id'] = $resultData['id'];
            $events['start'] = $resultData["start"];
            $events['end'] = $resultData["end"];
            $events['idUtilisateur'] = $resultData["idUtilisateur"];

            $response['success'] = 1;

            array_push($response['events'], $events);
        }
    }
    else{
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

    }
    echo json_encode($response);
}

else{
    $response = array();
    $response['events'] = array();

    $result = $bdd->prepare('SELECT * FROM events');
    $result->execute();

    if(!empty($result)){
        while($resultData = $result->fetch()){
            $events = array();
            $events['title'] = $resultData["title"];
            $events['id'] = $resultData['id'];
            $events['start'] = $resultData["start"];
            $events['end'] = $resultData["end"];
            $events['idUtilisateur'] = $resultData["idUtilisateur"];

            $response['success'] = 1;

            array_push($response['events'], $events);
        }
    }
    else{
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

    }
    echo json_encode($response);
}




