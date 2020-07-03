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
        $error = [];
        if (!(isset($username)) || strlen($username) > 50) {
            $error[1] = "ERR_REGUSR_USR";
            $error[0] = 0;
        }
        if (!(isset($password)) || strlen($password) > 50) {
            $error[2] = "ERR_REGUSR_PASS";
            $error[0] += 1;
        }
        if (!(isset($email)) || strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[3] = "ERR_REGUSR_MAIL";
            $error[0] += 1;
        }

        if (!empty($error)) {
            return $error; // Note: returned array look like this: [ 0 => int i (number of errors), {1 => USERNAME ERROR}, {2 => PASSWORD ERROR}, {3 => EMAIL ERROR} ] {} = optional
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
                return 'ERR_REGUSR_EXTUSR';
            }
        }
    }



}