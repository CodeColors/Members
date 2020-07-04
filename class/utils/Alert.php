<?php

require('../Config.php');

class Alert
{
    private $alertList = [];

    public function addAlert($type, $message){
        $config = new Config();
        $returnedMessage = $config->alertStyle;

        $returnedMessage = str_replace("%type", $type, $returnedMessage);
        $returnedMessage = str_replace("%message", $message, $returnedMessage);

        array_push($this->alertList, $returnedMessage);
        return end($this->alertList);
    }

    public function __construct(){
        return $this;
    }

    public function getAlerts(){
        return $this->alertList;
    }

    public function delAlert($alertId){
        unset($this->alertList[$alertId]);
    }
    
}