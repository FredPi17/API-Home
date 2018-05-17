<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 04/05/18
 * Time: 07:32
 */

include_once ('../../apiKeys/db_config_api.php');



    if(isset($_GET['date'])){
        $dateStart = $_GET['date']."%2000:00:00";
        $dateEnd = $_GET['date']."%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202140/feeds.json?api_key=C7GLOK1EY3C4GXVY&start=".$dateStart."&end=".$dateEnd;
        GetByDate($url);
    }
    else if(isset($_GET['year'])){
        $dateStart = $_GET['year']."-01-01%2000:00:00";
        $dateEnd = $_GET['year']."-12-31%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202140/feeds.json?api_key=C7GLOK1EY3C4GXVY&start=".$dateStart."&end=".$dateEnd;
        GetByYear($url);
    }
    else if(isset($_GET['monthyear'])){
        $dateStart = $_GET['monthyear']."-01%2000:00:00";
        $dateEnd = $_GET['monthyear']."-30%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202140/feeds.json?api_key=C7GLOK1EY3C4GXVY&start=".$dateStart."&end=".$dateEnd;
        GetByYearMonth($url);
    }
    else if(isset($_GET['temperature']) && isset($_GET['results'])){
        
    }
    else if(isset($_GET['humidite']) && isset($_GET['results'])){

    }
    else if(isset($_GET['results'])){

    }
    else{

    }


function GetByDate($url){

}

function GetByYear($url){

}

function GetByYearMonth($url){

}