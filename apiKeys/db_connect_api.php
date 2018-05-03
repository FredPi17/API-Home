<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 10:11
 */

class db_connect_api
{
    function __construct()
    {
        $this->connect();
    }
    function __destruct()
    {
        $this->close();
    }

    /**
     * connect to database
     * @return mysqli
     */
    function connect(){
        require_once __DIR__ . '/db_config_api.php';
        if($con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD)){
            echo "connection ok";
        }
        else {
            echo "connection failed";
            die(mysql_error());
        }
        $db = mysqli_connect(DB_DATABASE) or die(mysql_error());
        return $con;
    }

    /**
     *close connection to database
     */
    function close(){
        mysqli_close();
    }

    /**
     * @param $username
     * @param $apiKey
     * @param $secteur
     */
    function insert($username, $apiKey, $secteur){
        $db = $this->connect();
        $query = "INSERT INTO apiList(apiKey, username, secteur) VALUES ('$apiKey', '$username', '$secteur')";
        $db->query($query);
    }

}