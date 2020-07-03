<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Configuration Class
 */

class Config
{
    public $debugMode = false; // Only for development
    // DATABASE Configuration is in utils/Database.php


    public function __construct(){
        return $this;
    }

}