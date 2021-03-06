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

    public function CheckingToken($expectedToken, $checkVar){
        if(isset($checkVar['token']) AND $checkVar['token'] == $expectedToken) {
            return true;
        }else{
            return false;
        }
    }
}