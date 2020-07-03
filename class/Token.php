<?php

/*
 * Author: piaf
 * Date: 02/07/20
 * Description: Token Class
 */

class Token
{
    public function GenerateToken(){
        return sha1(time() + rand());
    }

    public function CheckToken($token, $expectedToken){
        if($token == $expectedToken) {
            return true;
        }else{
            return false;
        }
    }

    public function InputToken($token){
        return '<input type="hidden" value="'.$token.'" name="token" />';
    }

    public function AppendGetToken($url, $token){
        $url .= (parse_url($url, PHP_URL_QUERY) ? '&' : '?') . 'token='.$token;
        return $url;
    }

    public function CheckingToken($expectedToken, $getVar, $postVar, $sessionVar){
        if(isset($getVar['token']) AND $getVar['token'] == $expectedToken || isset($postVar['token']) AND $postVar['token'] == $expectedToken || isset($sessionVar['token']) AND $sessionVar == $expectedToken) {
            return true;
        }else{
            return false;
        }
    }
}