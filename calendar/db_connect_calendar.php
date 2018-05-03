<?php
/**
 * Created by PhpStorm.
 * User: Fred
 * Date: 02/05/2018
 * Time: 09:27
 */

class DB_CONNECT_calendar{

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
        require_once __DIR__ . '/db_config_calendar.php';
        if($con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD)){
            echo "connection ok";
        }
        else {
            echo "connection failed";
            die(mysqli_error($con));
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
}