<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 09:25
 */
require_once('db_config_calendar.php');
require_once('../apiKeys/db_config_api.php');

function GetEventsByDate(){
    global $bdd;
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

            $events['success'] = 1;

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

function GetEventsByYear(){
    global $bdd;
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

            $events['success'] = 1;

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

function GetEventsByMonthYear(){
    global $bdd;
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

            $events['success'] = 1;
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

function GetAll(){
    global $bdd;
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

            $events['success'] = 1;
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

if(VerifApi()){
    if(isset($_GET['date'])){
        GetEventsByDate();
    }
    else if(isset($_GET['year'])){
        GetEventsByYear();
    }
    else if(isset($_GET['monthyear'])){
        GetEventsByMonthYear();
    }
    else{
        GetAll();
    }
}