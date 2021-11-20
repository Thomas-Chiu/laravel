<?php

namespace App\Http\Controllers;

// 引用 Model
use App\Models\Location;
use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;
// 執行 query 用
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  public function index()
  {
    /* 
      原生寫法 (操作 DB)
      $data = DB::select("SELECT * FROM students");
      $data2 = DB::select("SELECT * FROM students WHERE name = 'thomas'");
     */

    /* 
      Eloquent 寫法 (操作 Model)
      all()、get() 都可查詢全部
      $data = Student::all();
      $data2 = Student::get();
     */

    /*
      find($id) === where("id", $id) 
      $data = Student::where("name", "thomas")->get();
      $data2 = Student::find(1);
     */

    /*
      所有 query 最後要用 get() 結束才會取得 Collection 物件
      Collection 有很多方法如 toArray() 轉成陣列
      $data4 = Student::where("name", "thomas")->get()->toArray();
     */

    /*
       測試一對一關聯
       $data = Phone::get();
       dd($data)
     */

    // 使用 Model 的 relation 方法
    $dataRelation = Student::with("phoneRelation")
      ->with("location")
      ->with("love")
      ->get();

    return view("student.index")
      // ->with("data", $data)
      // ->with("data2", $data2)
      ->with("dataRelation", $dataRelation);
  }

  public function create()
  {
    // 導向新增頁面
    return view("student.create");
  }

  public function store(Request $request)
  {
    // 可用 except() 過濾特定資料
    $input = $request->except("_token");
    // 或用原生 unset() 清除特定資料
    unset($input["_token"]);
    // dd($input);

    // 存 students 資料表
    $data = new Student;
    $data->name = $input["name"];
    $data->chinese = $input["chinese"];
    $data->english = $input["english"];
    $data->math = $input["math"];
    $data->save();

    // 存 phones 資料表
    $dataPhone = new Phone;
    $dataPhone->student_id = $data["id"];
    $dataPhone->phone = $input["phone"];
    $dataPhone->save();

    // 存 locations 資料表
    $dataLocation = new Location();
    $dataLocation->student_id = $data["id"];
    $dataLocation->location_name = $input["location"];
    $dataLocation->save();

    // 返回查詢首頁
    return redirect()->route("students.index");
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    // find($id) === where("id", $id)，
    $data = Student::find($id);
    $dataPhone = Phone::where("student_id", $id)->get();
    $dataLocation = Location::where("student_id", $id)->get();

    // 導向編輯頁面
    return view("student.edit")
      ->with("data", $data)
      ->with("dataPhone", $dataPhone)
      ->with("dataLocation", $dataLocation);
  }

  public function update(Request $request, $id)
  {
    // update 需用 PUT 或 PATCH
    $input = $request->except("_token", "_method");

    // 1. 修改 student 主資料
    $data = Student::find($id);
    $data->name = $input['name'];
    $data->chinese = $input['chinese'];
    $data->english = $input['english'];
    $data->math = $input['math'];
    $data->save();

    // 2. 刪除舊的副資料，再新增一筆 
    Phone::where("student_id", $id)->delete();
    $dataPhone = new Phone;
    $dataPhone->student_id = $data["id"];
    $dataPhone->phone = $input["phone"];
    $dataPhone->save();

    Location::where("student_id", $id)->delete();
    $dataLocation = new Location;
    $dataLocation->student_id = $data["id"];
    $dataLocation->location_name = $input["location"];
    $dataLocation->save();

    return redirect()->route('students.index');
  }

  public function destroy(Request $request, $id)
  {
    $input = $request->all();
    echo "DELETE ID: $id";
    // dd($input);
    Student::where("id", $id)->delete();

    return redirect()->route("students.index");
  }
}