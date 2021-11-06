<?php

namespace App\Http\Controllers;

// 引用 Model
use App\Models\Student;
use Illuminate\Http\Request;
// 執行 query 用
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  public function index()
  {
    // 原生寫法
    $data = DB::select("SELECT * FROM students");
    $data2 = DB::select("SELECT * FROM students WHERE name = 'thomas'");

    // Eloquent 寫法
    $data3 = Student::all()->toArray();
    $data4 = Student::where("name", "thomas")->get()->toArray();
    // 所有 query 最後要用 get() 結束才會取得 Collection 物件
    // Collection 有很多方法如 toArray() 轉成陣列

    return view("student.index")
      ->with("data", $data)
      ->with("data2", $data2)
      ->with("data3", $data3)
      ->with("data4", $data4);
  }

  public function create()
  {
    return view("student.create");
  }

  public function store(Request $request)
  {
    // 可用 except() 過濾特定資料
    $input = $request->except("_token");
    // 或用原生 unset() 清除特定資料
    unset($input["phone"]);
    // dd($input);
    $data = new Student;

    $data->name = $input["name"];
    $data->chinese = $input["chinese"];
    $data->english = $input["english"];
    $data->math = $input["math"];
    $data->save();

    return redirect()->route("students.index");
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    // 用 find($id) 找到 data，
    $data = Student::find($id);
    // dd($data);

    return view("student.edit")->with("data", $data);
  }

  public function update(Request $request, $id)
  {
    // update 需用 PUT 或 PATCH
    $input = $request->except("_token", "_method");

    $data = Student::find($id);
    $data->name = $input['name'];
    $data->chinese = $input['chinese'];
    $data->english = $input['english'];
    $data->math = $input['math'];
    $data->save();

    return redirect()->route('students.index');
  }

  public function destroy($id)
  {
    //
  }
}