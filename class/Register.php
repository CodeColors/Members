<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Registering class
 */

require('utils/Database.php');


class Register
{
    public function RegisterUser($username, $password, $email, $defRank)
    {
        $error = new ErrorManager();
        if (!(isset($username)) || strlen($username) > 50) { $error->addError('ERR_REGUSR_USR'); }
        if (!(isset($password)) || strlen($password) > 50) { $error->addError('ERR_REGUSR_PASS'); }
        if (!(isset($email)) || strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $error->addError('ERR_REGUSR_MAIL'); }

        $last_error = $error->getLastError();
        if ($last_error == 'ERR_REGUSR_USR' || $last_error == 'ERR_REGUSR_PASS' || $last_error == 'ERR_REGUSR_MAIL' ) {
            return $error->getErrorList();
        } else {
            $database = new Database();

            $result = $database->DoSQLRequest('SELECT COUNT(*) FROM users WHERE username = :username', array('username' => $username));
            if ($result == 0) {
                $rank = 0;
                if (isset($defRank)) {
                    $rank = $defRank;
                }

                $database->DoSQLRequest('INSERT INTO users VALUES(username, passsword, email, rank) SET (:username, :password, :email, :rank)', array('username' => $username, 'password' => $password, 'email' => $email, 'rank' => $rank));
                return true;
            } else {
                $error->addError('ERR_REGUSR_EXTUSR');
                return $error->getLastError();
            }
        }
    }



}