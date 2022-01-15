<?php

namespace App\Services;

class ArrayToStringService
{
  static public function hello()
  {
    dd("HELLO");
  }

  public function arrayToString($data)
  {
    $loveArr = [];

    foreach ($data["love"] as $key => $value) {
      $loveArr[] = $value["loves_name"];
    }

    $myString = implode(" ", $loveArr);
    return $myString;
  }

  public function monthReport()
  {
    // ......
  }

  public function yearReport()
  {
    // ......
  }
}