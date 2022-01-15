<?php

namespace App\Services;

class ArrayToStringService
{

    static public function hello(){
       dd('hello');
    }


    public function arrayToString($data){
        $loveArr = [];
        $loves = $data['lovesRelation'];
        foreach ($loves as $love) {
            array_push($loveArr, $love['name']);
        }
        $myString = implode(" ", $loveArr);
        return $myString;
    }

    public function yearReport(){

    }

    public function monthReport(){
        
    }



}
