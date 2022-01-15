<?php

namespace App\Repositories;
// 2. 建立 Repository 引用 Entities
use App\Models\Entities\Love;

class LoveRepository
{
  private $love;

  public function __construct(Love $love)
  {
    $this->love = $love;
  }

  public function addOne($input, $student_id)
  {
    $dataLove = new $this->love;
    $dataLove->student_id = $student_id;
    $dataLove->loves_name = $input["love"];
    $split = explode(" ", $input["love"]);
    $itemArr = [];

    foreach ($split as $key => $value) {
      $itemArr[] = [
        "student_id" => $student_id,
        "loves_name" => $value
      ];
    }

    Love::upsert($itemArr, ["student_id", "loves_name"]);
  }

  public function delById($student_id)
  {
    $this->love->where("student_id", $student_id)->delete();
  }
}