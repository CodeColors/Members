<?php

class ErrorManager
{

    private $errorList = [];

    public function addError($error){
        array_push($errorList, $error);
    }

    public function getErrorList(){
        return $this->errorList;
    }

    public function removeError($index){
        unset($this->errorList[$index]);
    }

    public function deleteErrorList(){
        unset($this->errorList);
    }

    public function getLastError(){
        return $this->errorList[end($this->errorList)];
    }

}