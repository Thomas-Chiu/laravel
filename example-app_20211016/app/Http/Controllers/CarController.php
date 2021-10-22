<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
  public function index()
  {
    // 可用 with() 將變數丟到前端 views
    $data = "我是 CarController 的 data";
    return view('car.index')->with("data", $data);
  }

  public function create()
  {
    return ("我是 CarController.create");
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    if ($id >= 1 && $id <= 9) return view('car.show')->with('id', $id);
    else return "$id 錯誤，請輸入數字 1 ~ 9";
  }

  public function edit($id)
  {
    return ("我是 CarController.edit: $id");
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }

  /*
    增加自定義方法
  */
  public function multiplicationTable()
  {
    for ($i = 1; $i <= 9; $i++) {
      for ($j = 1; $j <= 9; $j++) {
        echo "$i x $j &nbsp;";
      }
      echo "<br>";
    }
  }

  public function tableData()
  {
    $data = [
      ['id' => "s01", "name" => "amy"],
      ['id' => "s02", "name" => "bob"],
      ['id' => "s03", "name" => "cat"],
    ];
    // dd($data);
    return view("car.table")->with('data', $data);
  }
}