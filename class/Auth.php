<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Authentication class
 */

require('utils/Database.php');
require('utils/Token.php');
require('utils/Session.php');

class Auth
{

    public function ForceLogUser($password){ // Register case only. (+ development)
        $db = new Database();
        $user = $db->DoSQLRequest('SELECT * FROM users WHERE password = :password', array( 'password' => $password ));

        $SessionHandler = new Session();
        $session = $SessionHandler->SetSessionVar([], 'user', $user->fetch());

        $TokenHandler = new Token();
        $token = $TokenHandler->GenerateToken();
        $session = $SessionHandler->SetSessionToken($session, $token);

        return $session;
    }

}