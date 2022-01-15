<?php

namespace App\Repositories;

use App\Models\student;

class StudentRepository
{
    public $student;    

    public function __construct(Student $student)
    {
        $this->student = $student;        

    }

    public function getAll($paginate)
    {
        $data = $this->student->with('phoneRelation')->with('lovesRelation')->Paginate($paginate);
        return $data;
    }

    public function getByID($id){
        $data = $this->student->where('id', $id)->with('phoneRelation')->with('lovesRelation')->first();
        return $data;
    }

    public function addOne($input , $file){
        $data = new $this->student;
        $data->name = $input['name'];
        $data->chinese = $input['chinese'];
        $data->english = $input['english'];
        $data->math = $input['math'];
        if (!empty($file)) {
            $data->photo = $file->getClientOriginalName();
            $file->storeAs('images', $data->photo, 'public');
        }
        $data->save();
        return $data;
    }

    public function updateOne( $id , $input , $file){
        $data = $this->student->find($id);
        $data->name = $input['name'];
        $data->chinese = $input['chinese'];
        $data->english = $input['english'];
        $data->math = $input['math'];
        // 有修改檔案的話        
        if (!empty($file)) {
            $data->photo = $file->getClientOriginalName(); //有修改 才會update到
            $file->storeAs('images', $data->photo, 'public');
        }
        $data->save();
    }


    public function delByID($student_id){
        $this->student->where('id', $student_id)->delete();
    }

    
}
