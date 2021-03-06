<?php

require('Config.php');
require('utils/ErrorManager.php');
require('utils/Database.php');

class Manage
{
    /*
     * ModifyUserInfo
     *
     * $originUser = Session Object
     * $targetUser = Target User ID
     * $column = list of modified column
     * $values = values of column
     *
     * 🚨 WARNING : $values[0] => $column[0], $values[1] => $column[1], ...
     */

    public function ModifyUserInfo($originUser, $targetUser, $column, $values){
        $config = new Config();
        $error = new ErrorManager();

        if ($originUser['user']['id'] == $targetUser){ // If it's a self modification
            $database = new Database();

            $link_str = [];
            for($i=0; $i<count($column); $i++){
                $link_str[$i] = $column[$i] . " = " . $values[$i];
            }
            $link_str = implode(', ', $link_str);

            $database->DoSQLRequest("UPDATE users SET ($link_str) WHERE id = :id", array( 'id' => $targetUser));
        }else{ // Or an external user
            if ($originUser['user']['rank'] >= $config->minrank_modify_targetuser ){

            }else{
                $error->addError('ERR_MODIFYUSER_PERM');
                return $error->getLastError();
            }
        }
    }

}