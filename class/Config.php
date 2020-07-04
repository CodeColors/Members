<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Configuration Class
 */

class Config
{

    // DATABASE Configuration is in utils/Database.php

    /*
     * ALERTS - You must format the style like this:
     *          * %type = level of alert (success, danger, ...) (use in html class for example)
     *          * %message = message of alert
     */


    public $alertStyle = "";

    /*
     * RANKS - Settings relative to ranks and permissions
     */

    public $minrank_modify_targetuser = 1;


    public function __construct(){
        return $this;
    }

}