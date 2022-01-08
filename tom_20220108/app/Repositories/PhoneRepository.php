<?php

namespace App\Repositories;
// 2. 建立 Repository 引用 Entities
use App\Models\Entities\Phone;

class PhoneRepository
{
  private $phone;

  public function __construct(Phone $phone)
  {
    $this->phone = $phone;
  }

  public function addOne($input, $student_id)
  {
    $dataPhone = new $this->phone;
    $dataPhone->student_id = $student_id;
    $dataPhone->phone = $input["phone"];
    $dataPhone->save();
  }

  public function delById($student_id)
  {
    $this->phone->where("student_id", $student_id)->delete();
  }
}