<?php

/**
 * dataconnection handles connections to a data source using PDO.
 *
 * dataconnection connects to mySQL data source for app
 * hosted from Alan Webb's web.com hosting account. 
 * Future versions will make the app db server agnostic.
 *
 * @version 1.0
 * @author alan
 */
class dataconnection extends pdo {
    /* mySQL connection properties. Constants declared are
       for the Dev instance established at web.com on Alan Webb's
       hosting account. */
    public final $cn = pdo::query;
    private $connected;

    /*Where we want to end up is in a hashed text file that has the settings we need.
          Absence of that file should trigger recreating that file with some
          default settings. */
        //const default_cn_string = "'mysqlcluster8.registeredsite.com', 'trollboss', 'Love*78God','wow_dev', 3306";

    public function __construct($connected){
        /*What to do when an instance is created
         $con = new mysqli("'mysqlcluster8.registeredsite.com', 'trollboss', 'Love*78God','wow_dev', 3306")
	       or die ('Could not connect to the database server')
        }
         */ 
}
?>