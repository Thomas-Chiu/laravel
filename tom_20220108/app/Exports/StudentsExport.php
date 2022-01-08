<?php

namespace App\Exports;

use App\Models\Student;
// 方法一
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
  // 方法一：匯出全部資料
  public function collection()
  {
    return Student::all();
  }
}