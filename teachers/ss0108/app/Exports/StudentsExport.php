<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;

class StudentsExport implements FromView
{
    public function view(): View
    {

        $data = Student::with('phoneRelation')->get();

        return view("student.invoices")->with('students', $data);


        // return view('student.invoices', [
        //     'students' => Student::with('phoneRelation')->get()
        // ]);
    }
}

// namespace App\Exports;

// use App\Models\Student;
// use Maatwebsite\Excel\Concerns\FromCollection;

// class StudentsExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Student::all();
//     }
    
// }
