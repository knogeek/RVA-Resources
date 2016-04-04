<?php

/**
 * data_cn class to connect to the mySQL instance for this app.
 *
 * data_cn wrapper class to provide a PDO connection to a mySQL instance containing the data for this app.
 *
 * @version alpha
 * @author alan webb
 */
class data_cn
{
    //In the end, this stuff needs to be hashed and hidden in a config file
    private $host = "mysqlcluster8.registeredsite.com";
    private $dbname = "wow_dev";
    private $socket = "";
    private $user = "trollboss";
    private $pwd = "Love*78God";

    public $cn;                //Connection object, as yet undefined

    public function open(){
        try{
            $cn = new pdo("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        }
        catch (Exception $pdoe){
            die ("Yeah, uhm . . . connecting to the data server failed: " . $pdoe . "We probably know about it. You can e-mail support@worldofwebb.net to tell us what you are seeing.");
        }
    }

    public function __construct($opencn){
        //Collect login info?
        //Otherwise
        //this::open();

    }

}