<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Authentication class
 */

require('utils/Database.php');
require('utils/Token.php');
require('utils/Session.php');
require('utils/ErrorManager.php');

class Auth
{

    public function ForceLogUser($id){ // Register case only. (+ development)
        $db = new Database();
        $user = $db->DoSQLRequest('SELECT * FROM users WHERE id = :id', array( 'id' => $id ));

        $SessionHandler = new Session();
        $session = $SessionHandler->SetSessionVar([], 'user', $user->fetch());

        $TokenHandler = new Token();
        $token = $TokenHandler->GenerateToken();
        $session = $SessionHandler->SetSessionToken($session, $token);

        return $session;
    }

    public function LogUserWithUsername($username, $password){
        $db = new Database();
        $user = $db->DoSQLRequest('SELECT * FROM users WHERE mail = :mail LIMIT 1', array( 'mail' => $username ));

        if ($user->rowCount() > 0){
            $error = new ErrorManager();
            $error->addError('ERR_LOGUSR_NOTEXIST');
            return $error->getLastError();
        }

        $user = $user->fetch();

        if($user['password'] == $password){
            $SessionHandler = new Session();
            $session = $SessionHandler->SetSessionVar([], 'user', $user);

            $TokenHandler = new Token();
            $token = $TokenHandler->GenerateToken();
            $session = $SessionHandler->SetSessionToken($session, $token);

            return $session;
        }else{
            $error = new ErrorManager();
            $error->addError('ERR_LOGUSR_BADPASS');
            return $error->getLastError();
        }
    }

    public function LogUserWithMail($mail, $password){
        $db = new Database();
        $user = $db->DoSQLRequest('SELECT * FROM users WHERE mail = :mail LIMIT 1', array( 'mail' => $mail ));

        if ($user->rowCount() > 0){
            $error = new ErrorManager();
            $error->addError('ERR_LOGUSR_NOTEXIST');
            return $error->getLastError();
        }

        $user = $user->fetch();

        if($user['password'] == $password){
            $SessionHandler = new Session();
            $session = $SessionHandler->SetSessionVar([], 'user', $user);

            $TokenHandler = new Token();
            $token = $TokenHandler->GenerateToken();
            $session = $SessionHandler->SetSessionToken($session, $token);

            return $session;
        }else{
            $error = new ErrorManager();
            $error->addError('ERR_LOGUSR_BADPASS');
            return $error->getLastError();
        }


    }

}