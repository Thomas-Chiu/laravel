<?php

namespace App\Http\Controllers;

/**
 * 引用 Model
    use App\Models\Location;
    use App\Models\Love;
    use App\Models\Phone;
    use App\Models\Students;
 */

use Illuminate\Http\Request;
// fileStorage 用
use Illuminate\Support\Facades\Storage;
// 引用 Excel 套件
use App\Exports\StudentsExport;
use App\Exports\PhonesExport;
use Maatwebsite\Excel\Facades\Excel;
// 3. 引用 Entities、Repositories、Services
use App\Models\Entities\Student;
use App\Models\Entities\Location;
use App\Models\Entities\Love;
use App\Models\Entities\Phone;
use App\Repositories\StudentRepository;
use App\Repositories\PhoneRepository;
use App\Repositories\LocationRepository;
use App\Repositories\LoveRepository;
use App\Services\ArrayToStringService;

class StudentController extends Controller
{
  // 4. 依賴注入
  private $studentRepository;
  private $phoneRepository;
  private $locationRepository;
  private $loveRepository;

  public function __construct(
    StudentRepository $studentRepository,
    PhoneRepository $phoneRepository,
    LocationRepository $locationRepository,
    LoveRepository $loveRepository
  ) {
    $this->studentRepository = $studentRepository;
    $this->phoneRepository = $phoneRepository;
    $this->locationRepository = $locationRepository;
    $this->loveRepository = $loveRepository;
  }

  public function index()
  {
    $data = $this->studentRepository->getAll(5);
    // dd($data->toArray());
    return view("student.index")->with("data", $data);
  }

  public function create()
  {
    return view("student.create");
  }

  public function store(Request $request)
  {
    $input = $request->except("_token");
    $file = $request->file("photo");

    // 1. 存主資料 + 檔案
    $data = $this->studentRepository->addOne($input, $file);

    // 2. 存一對一
    $this->phoneRepository->addOne($input, $data["id"]);
    $this->locationRepository->addOne($input, $data["id"]);

    // 3. 存一對多
    $this->loveRepository->addOne($input, $data["id"]);

    return redirect()->route("students.index");
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    $data = $this->studentRepository->getById($id);

    // 商業邏輯 1
    $arrToStrService = new ArrayToStringService();
    $data["love"] = $arrToStrService->arrayToString($data);

    // 商業邏輯 2 
    // ArrayToStringService::hello();
    $arrToStrService->monthReport();
    $arrToStrService->yearReport();
    // dd($data);

    return view("student.edit")->with("data", $data);
  }

  public function update(Request $request, $id)
  {
    $input = $request->except("_token", "_method");
    $file = $request->file("photo");

    // 1. 修改主資料
    $data = $this->studentRepository->updateOne($id, $input, $file);
    // dd($data);

    // 2. 刪除副資料，再新增一筆 
    $this->phoneRepository->delById($id);
    $this->phoneRepository->addOne($input, $id);
    $this->locationRepository->delById($id);
    $this->locationRepository->addOne($input, $id);
    $this->loveRepository->delById($id);
    $this->loveRepository->addOne($input, $id);

    return redirect()->route('students.index');
  }

  public function destroy(Request $request, $id)
  {
    // 刪除檔案
    $file = Student::where("id", $id)->first()->photo;
    Storage::delete("public/img/$file");

    // 1. 刪除主資料
    $this->studentRepository->delById($id);

    // 2. 刪除副資料
    $this->phoneRepository->delById($id);
    $this->locationRepository->delById($id);
    $this->loveRepository->delById($id);

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
    return Excel::download(new StudentsExport, "ExportStudents.xlsx");
  }

  public function exportPhone()
  {
    return Excel::download(new PhonesExport, "ExportPhones.xlsx");
  }
}