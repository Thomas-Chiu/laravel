<?php

namespace App\Repositories;

use App\Models\Love;

class LoveRepository
{
    public $love;    

    public function __construct(Love $love)
    {
        $this->love = $love;        

    }

    public function addOne($loveArr , $student_id){
        foreach ($loveArr as $key => $value) {
            $dataLove = new Love;
            $dataLove->student_id = $student_id; //學生資料新增的id
            $dataLove->name = $value; //create blade input
            $dataLove->save();
        }
    }

    public function delByID($student_id){
        $this->love->where('student_id', $student_id)->delete();
    }
}
