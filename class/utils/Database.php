<?php

/*
 * Author: piaf
 * Date: 02/07/20
 * Description: Database class
 */

class Database
{
    public $host = 'localhost';
    public $database = 'members';
    private $username = 'root';
    private $password = '';

    function __construct(){
        return $this;
    }

    private function GetDatabase(){
        try{
            $db = new PDO('mysql:host='. $this->host .';dbname='. $this->database .', '. $this->username .',' . $this->password );
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $db;
        }catch(Exception $e){
            return false;
        }
    }

    public function DoSQLRequest($request, $array){ // SQL Request + Array of index champs
        $db = $this->GetDatabase();
        if($db){
            $s = $db->prepare($request);
            $s-execute($array);
            return $s;
        }

    }



}