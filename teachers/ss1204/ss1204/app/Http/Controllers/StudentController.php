<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Phone;
use App\Models\Love;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
 
        // $data = Phone::get();
        // dd($data);
        // $data = Student::find(1)->phone;
        
        // with後relations model 可自訂function phone123 
        $data = Student::with('phoneRelation')->with('lovesRelation')->get();
        // $data = Student::with('phoneRelation')->with('locationRelation')->get();

        // 抓第一個學生資料
        // foreach ($data as $key => $value) {
        //     dd($value);
        // }


        // 抓第一個學生資料
        // foreach ($data as $key => $value) {
        //     // $value一個學生
        //     // $value['loveRelation'] 一個學生的全部愛好
        //     foreach ($value['lovesRelation'] as $valueKey => $loveRelation) {
        //         // dd($valueValue);
        //     }
        // }






        // foreach($age as $x => $val) {
        //     echo "$x = $val<br>";
        //   }
        // dd($data);

        return view("student.index")->with('data', $data);

        // $url = route('students.index');
        // $url = view("student.create");
        // dd($url);
        // $data = DB::select('select * from students');

        // dd($data);
        
        //select all
        // 所有query 最後都要用get() or first or ..()
        // $data = Student::orderBy('id','desc')->take(2)->get();
        // unset清除資料
        // unset($data[0]['chinese']);
        // dd($data);
        
        // dd($data);

        //select 1
        //  $data = Student::where('name','bob')->get();
        //  dd($data);
        // dd($data456->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(view("student.create"));
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
        $input = $request->except("_token");
        // dd($input);

        

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
        $data->photo = $file->getClientOriginalName();
        $data->save();
        
        $request->photo->storeAs('images', $data->photo, 'public');
        

        // 2.存phone data 
        $dataPhone = new Phone;
        $dataPhone->student_id = $data['id']; //學生資料新增的id
        $dataPhone->phone = $input['phoneInput']; //create blade input
        $dataPhone->save();
        return redirect()->route('students.index');

        // dd(route('students.index'))
        // $input = $request->except('_token');
        // $input->toArray();
        // var_dump($input);
        // dd($input);
        // return "hello store action";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        // dd($data);
        return view('student.edit')->with('data', $data);

        // return "hello ediit $id";
        // 找到id的data
        // dd($data);
     
        // route('x','y');
        // route('x',[1,2,3]);
        // route('x',['key1'=>'value1', 'key2'=>'value2']);
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
         dd($input);

        
        $input = $request->except("_token","_method");        

        // 1.修改student data
        // 2.修改phone data 

        // 1.修改student data
        $data = Student::find($id);
        $data->name = $input['name'];
        $data->chinese = $input['chinese'];
        $data->english = $input['english'];
        $data->math = $input['math'];
        $data->save();

        // 2.修改phone data 
        // 2.1 刪除 phone data
        Phone::where('student_id',$id)->delete();
        // 2.2 新增 phone data
        $dataPhone = new Phone;
        $dataPhone->student_id = $data['id']; //學生資料新增的id
        $dataPhone->phone = $input['phoneInput']; //create blade input
        $dataPhone->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // dd($request);
        // $input = $request->all();
        // dd($input);
        Student::where('id',$id)->delete();
        Phone::where('student_id',$id)->delete();
        // find($id) ==  where('name','amy123')->get()
        // $data = Student::where('name','amy123')->get();
        // dd($data);

        return redirect()->route('students.index');
    }

    public function createFile(){
        // dd('hello create file :))');
        // $url = storage_path('app/public');
        // dd($url);
        // Storage::disk('public')->put('publicEx.txt', 'Contents');
        return view("file.create");
    }

    public function storeFile(Request $request){
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
}
