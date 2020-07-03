<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Session class
 */

class Session
{

    public function SetSessionToken($token, $session){
        $session['token'] = $token;
        return $session;
    }

    public function SetSessionVar($session, $key, $var ){
        $session[$key] = $var;
        return $session;
    }

    public function CheckSession($key, $expectedValue, $session){
        if($session[$key] == $expectedValue){
            return true;
        }else{
            return false;
        }
    }

    public function SessionChecker($session){
        if(isset($session) and !empty($session)){
            return true;
        }else{
            return false;
        }
    }


}