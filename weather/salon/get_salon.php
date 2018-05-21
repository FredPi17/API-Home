<?php
/**
 * Created by PhpStorm.
 * User: fredericpinaud
 * Date: 17/05/2018
 * Time: 23:00
 */

include_once ('../../apiKeys/db_config_api.php');
include_once ('../get_weather.php');

if(VerifApi()){
    if(isset($_GET['date'])){
        $dateStart = $_GET['date']."%2000:00:00";
        $dateEnd = $_GET['date']."%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/feeds.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByDate($url);
    }
    if(isset($_GET['date']) && isset($_GET['temperature'])){
        $dateStart = $_GET['date']."%2000:00:00";
        $dateEnd = $_GET['date']."%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/fields/2.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByDate($url);
    }
    if(isset($_GET['date']) && isset($_GET['humidite'])){
        $dateStart = $_GET['date']."%2000:00:00";
        $dateEnd = $_GET['date']."%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/fields/1.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByDate($url);
    }
    else if(isset($_GET['year'])){
        $dateStart = $_GET['year']."-01-01%2000:00:00";
        $dateEnd = $_GET['year']."-12-31%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/feeds.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByYear($url);
    }
    else if(isset($_GET['year']) && isset($_GET['humidite'])){
        $dateStart = $_GET['year']."-01-01%2000:00:00";
        $dateEnd = $_GET['year']."-12-31%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/fields/1.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByYear($url);
    }
    else if(isset($_GET['year']) && isset($_GET['temperature'])){
        $dateStart = $_GET['year']."-01-01%2000:00:00";
        $dateEnd = $_GET['year']."-12-31%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/fields/2.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByYear($url);
    }
    else if(isset($_GET['monthyear'])){
        $dateStart = $_GET['monthyear']."-01%2000:00:00";
        $dateEnd = $_GET['monthyear']."-30%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/feeds.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByYearMonth($url);
    }
    else if(isset($_GET['monthyear']) && isset($_GET['humidite'])){
        $dateStart = $_GET['monthyear']."-01%2000:00:00";
        $dateEnd = $_GET['monthyear']."-30%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/fields/1.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByYearMonth($url);
    }
    else if(isset($_GET['monthyear']) && isset($_GET['temperature'])){
        $dateStart = $_GET['monthyear']."-01%2000:00:00";
        $dateEnd = $_GET['monthyear']."-30%2023:59:59";
        $url = "https://api.thingspeak.com/channels/202142/fields/2.json?api_key=BXT8ZNRXT3EU4LSV&start=".$dateStart."&end=".$dateEnd;
        GetByYearMonth($url);
    }
    else if(isset($_GET['temperature']) && isset($_GET['results'])){
        $results = $_GET['results'];
        $url = "https://api.thingspeak.com/channels/202142/fields/2.json?api_key=BXT8ZNRXT3EU4LSV&results=".$results;
        GetTemperature($url);
    }
    else if(isset($_GET['humidite']) && isset($_GET['results'])){
        $results = $_GET['results'];
        $url = "https://api.thingspeak.com/channels/202142/fields/1.json?api_key=BXT8ZNRXT3EU4LSV&results=".$results;
        GetHumidity($url);
    }
    else if(isset($_GET['results'])){
        $results = $_GET['results'];
        $url = "https://api.thingspeak.com/channels/202142/feeds.json?api_key=BXT8ZNRXT3EU4LSV&results=".$results;
        GetByResults($url);
    }
    else{

    }
}