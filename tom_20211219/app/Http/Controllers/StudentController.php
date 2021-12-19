<?php

namespace App\Http\Controllers;

// 引用 Model
use App\Models\Location;
use App\Models\Love;
use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;
// 執行 query 用
use Illuminate\Support\Facades\DB;
// fileStorage 用
use Illuminate\Support\Facades\Storage;
// 引用 Excel 套件
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

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
      // ->get()
      ->paginate(10);

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
    $file = $request->file("photo");

    /** 
     * 1. 存主資料 & 上傳檔案
     */

    // 存 students 資料表
    $data = new Student;
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

    /**
     * 2. 存一對一資料表
     */

    // 存 phones 資料表
    $dataPhone = new Phone;
    $dataPhone->student_id = $data["id"];
    $dataPhone->phone = $input["phone"];
    $dataPhone->save();

    // 存 locations 資料表
    $dataLocation = new Location;
    $dataLocation->student_id = $data["id"];
    $dataLocation->location_name = $input["location"];
    $dataLocation->save();

    /**
     * 3. 存一對多資料表
     *  3.1 explode() 切字串 (空格) 成陣列
     *  3.2 取得 student_id
     *  3.3 存一對多
     */

    // 存 loves 資料表
    $split = explode(" ", $input["love"]);
    // dd($input, $split);

    /** 方法一 foreach 
     * foreach ($split as $key => $value) {
     *   $dataLove = new Love;
     *   $dataLove->student_id = $data["id"];
     *   $dataLove->loves_name = $value;
     *   $dataLove->save();
     * }
     */

    // 方法二 upsert 
    $itemArr = [];
    foreach ($split as $key => $value) {
      $itemArr[] = [
        "student_id" => $data["id"],
        "loves_name" => $value
      ];
      /** 兩種寫法都可以 
       * $item = [
       *   "student_id" => $data["id"],
       *   "loves_name" => $value
       * ];
       * array_push($itemArr, $item);
       */
    }
    // dd($itemArr);
    Love::upsert($itemArr, ["student_id", "loves_name"]);

    // 返回查詢首頁
    return redirect()->route("students.index");
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    /**
     * find($id) === where("id", $id)
     * first() = fetch
     * get() = fetchAll
     */
    $data = Student::where("id", $id)->with("love")->first();
    $dataPhone = Phone::where("student_id", $id)->get();
    $dataLocation = Location::where("student_id", $id)->get();

    /** 
     * 先整理一對多的資料
     * 再 implode() 陣列組合成字串
     */

    $loveArr = [];
    foreach ($data["love"] as $key => $value) {
      $loveArr[] = $value["loves_name"];
    }
    // dd($loveArr);
    $data["love"] = implode(" ", $loveArr);
    // dd($data["love"]);

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
    $file = $request->file("photo");
    // dd($input);

    // 1. 修改 student 主資料
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

    // 待解決 student_id 問題
    Love::where("student_id", $id)->delete();
    $dataLove = new Love;
    $dataLove->student_id = $data["id"];
    $dataLove->loves_name = $input["love"];

    return redirect()->route('students.index');
  }

  public function destroy(Request $request, $id)
  {
    echo "DELETE ID: $id";
    // $test = Storage::allFiles();
    // dd($test);

    // 刪除檔案
    $file = Student::where("id", $id)->first()->photo;
    Storage::delete("public/img/$file");
    // 刪除主資料
    Student::where("id", $id)->delete();
    // 刪除副資料
    Phone::where("student_id", $id)->delete();
    Location::where("student_id", $id)->delete();
    Love::where("student_id", $id)->delete();

    return redirect()->route("students.index");
  }

  /**
   * 自訂方法
   */

  public function createFile()
  {
    return view("file.create");
  }

  public function storeFile(Request $request)
  {
    // $url1 = public_path();
    // $url2 = storage_path();
    // dd($url1, $url2);

    // 兩種寫法都可抓到上傳檔案的資訊
    $file = $request->photoFile;
    $file = $request->file("photoFile");
    // dd($file);


    /* 方法二 */
    $rename = "我是自訂檔名.png";
    // 存 hash 檔名
    $request->photoFile->store("img", "public");
    // 存自訂檔名
    $request->photoFile->storeAs("img", $rename, "public");

    /* 方法一 */
    // Storage::disk('public')->put('寫入檔案.txt', '我是內容');
    // return ("寫檔成功");

    // 取得原始檔名或 hash 後的檔名
    // dd($file->getClientOriginalName());
    // dd($file->hashName());

    // Storage::disk("public")->put("img", $file);
    return redirect()->route("students.create-file");
  }

  /**
   * Excel 匯出
   */
  public function export()
  {
    return Excel::download(new StudentsExport, 'StudentsExport.xlsx');
  }
}