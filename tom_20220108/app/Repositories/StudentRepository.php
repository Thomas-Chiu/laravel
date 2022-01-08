<?php

namespace App\Repositories;
// 2. 建立 Repository 引用 Entities
use App\Models\Entities\Student;

class StudentRepository
{
  private $student;

  public function __construct(Student $student)
  {
    $this->student = $student;
  }

  public function getAll($paginate)
  {
    // return $this->StudentRepository->all();

    $data = Student::with("phoneRelation")
      ->with("location")
      ->with("love")
      ->paginate($paginate);

    return $data;
  }

  public function getById($id)
  {
    return $this->student->find($id);
  }

  public function addOne($input, $file)
  {
    $data = new $this->student;
    $data->name = $input["name"];
    $data->chinese = $input["chinese"];
    $data->english = $input["english"];
    $data->math = $input["math"];
    if (!empty($file)) {
      $rename = "$input[name]" . "-" . $file->getClientOriginalName();
      $file->storeAs("img", $rename, "public");
      $data->photo = $rename;
    };
    $data->save();

    return $data;
  }

  public function updateOne($id, $input, $file)
  {
    $data = Student::find($id);
    $data->name = $input['name'];
    $data->chinese = $input['chinese'];
    $data->english = $input['english'];
    $data->math = $input['math'];
    if (!empty($file)) {
      // 有修改檔案才會 update 到
      $rename = "$input[name]" . "-" . $file->getClientOriginalName();
      $file->storeAs("img", $rename, "public");
      $data->photo = $rename;
    };
    $data->save();

    return $data;
  }

  public function delById($id)
  {
    $this->student->where("id", $id)->delete();
  }
}