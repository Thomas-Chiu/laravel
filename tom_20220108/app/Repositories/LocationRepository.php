<?php

namespace App\Repositories;
// 2. 建立 Repository 引用 Entities
use App\Models\Entities\Location;

class LocationRepository
{
  private $location;

  public function __construct(Location $location)
  {
    $this->location = $location;
  }

  public function addOne($input, $student_id)
  {
    $dataLocation = new $this->location;
    $dataLocation->student_id = $student_id;
    $dataLocation->location_name = $input["location"];
    $dataLocation->save();
  }

  public function delById($student_id)
  {
    $this->location->where("student_id", $student_id)->delete();
  }
}