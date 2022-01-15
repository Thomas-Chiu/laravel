<?php

namespace App\Repositories;

use App\Models\phone;

class PhoneRepository
{
    public $phone;    

    public function __construct(Phone $phone)
    {
        $this->phone = $phone;        

    }

    public function addOne($input , $student_id){
        $dataPhone = new $this->phone;
        $dataPhone->student_id = $student_id; //學生資料新增的id
        $dataPhone->phone = $input['phoneInput']; //create blade input        
        $dataPhone->save();
    }

    public function delByID($student_id){
        $this->phone->where('student_id', $student_id)->delete();
    }
}
