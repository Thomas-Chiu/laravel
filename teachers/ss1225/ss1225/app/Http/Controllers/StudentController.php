<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Phone;
use App\Models\Love;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $str1 = rand(00,99);
        // $str2 = rand(000000,999999);
        // $str1 = $this->changeStr($str1,2);
        // $str2 = $this->changeStr($str2,6);
        // // $str = 000123;
        // // $changeStr = str_pad($str,6,"0",STR_PAD_LEFT);
        // $changeStr = "09".$str1 ."-". $str2;
        // dd($changeStr);
        // $now = now();
        // dd($now);

        // $data = Student::with('phoneRelation')->with('lovesRelation')->get();

        $data = Student::with('phoneRelation')->with('lovesRelation')->Paginate(5);
        // dd($data);
        return view("student.index")->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
            array:7 [▼
            "name" => null
            "chinese" => null
            "english" => null
            "math" => null
            "phoneInput" => null
            "love" => "6 7 8"
            "submit" => "submit"
        ]
        */

        $input = $request->except("_token");
        // dd($input);
        $loveArr = explode(" ", $input['love']);

        //1.切字串->array 空格
        //3.存到一對多  dd($loveArr);
        // 3.1 $loveArr
        // 3.2 add id
        // 3.3 foreach save 一對多

        // 1.存student data
        // 1.1 存student photo
        // 2.存phone data 

        // 1.1存student photo
        $file = $request->file('photo');
        // $rename = "55688.jpg";

        // 1.存student data
        $data = new Student;
        $data->name = $input['name'];
        $data->chinese = $input['chinese'];
        $data->english = $input['english'];
        $data->math = $input['math'];
        if (!empty($file)) {
            $data->photo = $file->getClientOriginalName();
            $request->photo->storeAs('images', $data->photo, 'public');
        }
        $data->save();

        // 2.存phone data 
        $dataPhone = new Phone;
        $dataPhone->student_id = $data['id']; //學生資料新增的id
        //第一個方法 不改資料庫 
        // if (empty($input['phoneInput'])) {
        //     $input['phoneInput'] = "no phone"; //create blade input            
        // }
        $dataPhone->phone = $input['phoneInput']; //create blade input        
        $dataPhone->save();

        //3.存到一對多  dd($loveArr);
        // 3.1 $loveArr
        // $loveArr = explode(" ",$input['love']);
        // 3.2 add id

        // 3.3 foreach save 一對多

        // 3.3 方法一 foreach
        foreach ($loveArr as $key => $value) {
            $dataLove = new Love;
            $dataLove->student_id = $data['id']; //學生資料新增的id
            $dataLove->name = $value; //create blade input
            $dataLove->save();
        }

        // 3.3 方法二 upsert
        // $arr = [
        //     ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
        //     ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
        // ];
        // $arr = [];
        // foreach ($loveArr as $key => $value) {
        //     $arr[] = ['student_id'=> $data['id'] , 'name'=> $value];
        // }
        // // dd($arr);
        // Love::upsert($arr, ['student_id' , 'name']);

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get -> fetchAll 
        // first -> fetch
        $data = Student::where('id', $id)->with('phoneRelation')->with('lovesRelation')->first();
        $loveArr = [];
        $loves = $data['lovesRelation'];
        foreach ($loves as $love) {
            array_push($loveArr, $love['name']);
        }
        $data['love'] = implode(" ", $loveArr);
        // dd($data);
        return view('student.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input = $request->except("_token", "_method");
        // 1.修改student data
        // 2.修改phone data 

        // 1.修改student data
        $data = Student::find($id);
        $data->name = $input['name'];
        $data->chinese = $input['chinese'];
        $data->english = $input['english'];
        $data->math = $input['math'];
        // 有修改檔案的話
        $file = $request->file('photo');
        if (!empty($file)) {
            $data->photo = $file->getClientOriginalName(); //有修改 才會update到
            $request->photo->storeAs('images', $data->photo, 'public');
        }
        $data->save();

        // 2.修改phone data 
        // 2.1 刪除 phone data
        Phone::where('student_id', $id)->delete();
        // 2.2 新增 phone data
        $dataPhone = new Phone;
        $dataPhone->student_id = $data['id']; //學生資料新增的id
        $dataPhone->phone = $input['phoneInput']; //create blade input
        $dataPhone->save();

        // 3.愛好 一對多修改
        // 3.1 先刪除 全部
        Love::where('student_id', $id)->delete();
        // 3.2 新增 多
        $loveArr = explode(" ", $input['love']);
        foreach ($loveArr as $key => $value) {
            $dataLove = new Love;
            $dataLove->student_id = $data['id']; //學生資料新增的id
            $dataLove->name = $value; //create blade input
            $dataLove->save();
        }
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($id);
        Student::where('id', $id)->delete();
        Phone::where('student_id', $id)->delete();
        Love::where('student_id', $id)->delete();
        return redirect()->route('students.index');
    }

    public function createFile()
    {
        // dd('hello create file :))');
        // $url = storage_path('app/public');
        // dd($url);
        // Storage::disk('public')->put('publicEx.txt', 'Contents');
        return view("file.create");
    }

    public function storeFile(Request $request)
    {
        // $input = $request->all();
        $file = $request->file('photo');
        $rename = "55688.jpg";
        //方法二
        $request->photo->storeAs('images', $rename, 'public');

        //方法一
        // $file = $request->photo;
        // dd('123');
        // dd($file);
        // Storage::disk('public')->put('folder123', $file);
        // dd($file->hashName());
        // dd($file->getOri....());
        // dd('hello store file :))');
        return redirect()->route('students.create-file');
    }


    /**
     * export excel
     */
    public function export()
    {
        return Excel::download(new StudentsExport, 'StudentsExport123.xlsx');
    }

    private function changeStr($str, $num)
    {
        $changeStr = str_pad($str, $num, "0", STR_PAD_LEFT);
        return $changeStr;
    }


    public function exportView()
    {
        return Excel::download(new StudentsExport, 'invoices_1215.xlsx');
    }

    // public function del_all(){
    //     Student::delete();
    //     Phone::delete();
    //     Love::delete();
    //     return redirect()->route('students.index');
    // }
}
