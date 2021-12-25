<?php

namespace App\Exports;

use App\Models\Student;
// 方法二
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PhonesExport implements FromView
{
  // 方法二：匯出特定欄位 
  public function view(): View
  {
    // return view("student.phone", [
    //   "students" => Student::with("phoneRelation")->get()
    // ]);

    $data = Student::with("phoneRelation")->get();
    return view("student.phone")->with("data", $data);
  }
}