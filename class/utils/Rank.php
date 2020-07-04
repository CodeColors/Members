<?php

/*
 * Author: piaf
 * Date: 03/07/20
 * Description: Rank class
 */

class Rank
{

    private $RankList = [ [id => 0, name=>"User"], [id => 1, name=>"Moderator"], [id => 2, name=>"Administrator"]]; // 1st rank is default rank - id = key in the array

    public function GetRankObject($id){
        return $this->RankList[$id];
    }

}