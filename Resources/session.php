<?php

/**
 * Session holds encrypted info about whether the user is authenticated, if they are actively 
 * using the session, their preferences, etc. Idle sessions time out into a lock and then 
 * log off and end if idle too long.
 *
 *
 * @version 1.0
 * @author alan webb
 */
class session {
    
    /*properties needed: 
    currentusername, 
    currentpwd, 
    sessionid, 
    sessionstart, 
    sessionexpires 
    dbcn
    */
    public $currentuseracct;            //Account name of current user
    public $currentusername;            //Common name (firstname?) of current user
    public $sessionid;                  //11 character identifier of current session, destroyed when session ends.
    public $sessionlocks;               //time at which session locks but is not destroyed
    public $sessionexpires;             //time at which session expires and user is forcibly logged off.
    public $dbcn;                       //PDO connection object

    private $pwd;                       //user's password, encrypted.

    function __construct($user, $pwd ){
	    try{
        //try connecting to the database and die if connection fails

        }
        catch(exception $e){
            die("Session could not start: " . $e . " If this keeps happening, e-mail support@worldofwebb.net.");
        }
        finally{
            $dbcn=null;

            /*Probably don't just kill the session on object create. Probably keep the session live 
              unless it's been idle or locked too long.*/

            $sessionid=null;
        }
    }
    

}