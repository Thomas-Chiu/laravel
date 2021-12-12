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
        // $arr = [];
        // $arr[] = ['student_id'=> 's1' , 'name'=> 'n1'];
        // $arr[] = ['student_id'=> 's2' , 'name'=> 'n2'];
        // $arr[] = ['student_id'=> 's3' , 'name'=> 'n2'];
        // dd($arr);
        

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
        $loveArr = explode(" ", $input['love']);
        // dd($loveArr);


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
        if(!empty($file)){
            $data->photo = $file->getClientOriginalName();
            $request->photo->storeAs('images', $data->photo, 'public');
        }        
        $data->save();


        // 2.存phone data 
        $dataPhone = new Phone;
        $dataPhone->student_id = $data['id']; //學生資料新增的id
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
        

        // get -> fetchAll 
        // first -> fetch
        $data = Student::where('id',$id)->with('lovesRelation')->first();
        // dd($data);
        // $data = Student::find($id);
        // array to string => implode
        // $data['lovesRelation'];
        $loveArr = [];
        // dd($data['lovesRelation']->toArray());
        $loves = $data['lovesRelation'] ;
        // foreach ($data['lovesRelation'] as $key => $value) {
        //     array_push($loveArr,$value['name']);
        // }

        foreach ($loves as $love) {
            array_push($loveArr,$love['name']);
        }
        // dd($loveArr);
        //array to string
        $data['love'] = implode(" " , $loveArr);

        // $loveArr = [];
        // for($i=0; $i < count($data['lovesRelation']) ;$i++){
        //     array_push($loveArr,$data['lovesRelation'][$i]['name']);
        // }
        // $data['love'] = implode(" " , $loveArr);
        
        // $loveArr = [];
        // array_push($loveArr ,'AAA');
        // array_push($loveArr ,'bbb');
        // array_push($loveArr ,'ccc');
        // dd($loveArr);
       
        // dd($data['lovesRelation']);


        // 抓love
        // many -> str
        // dd($data);
        return view('student.edit')->with('data', $data);

        // return "hello ediit $id";
        // 找到id的data

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
        // dd($input);


        $input = $request->except("_token", "_method");

        
       


        // 1.修改student data
        // 2.修改phone data 

        // 1.修改student data
        $data = Student::find($id);
        // dd($data);
        $data->name = $input['name'];
        $data->chinese = $input['chinese'];
        $data->english = $input['english'];
        $data->math = $input['math'];
        
        // 有修改檔案的話
        $file = $request->file('photo');        
        if(!empty($file)){
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
        // dd($request);
        // $input = $request->all();
        // dd($input);
        Student::where('id', $id)->delete();
        Phone::where('student_id', $id)->delete();
        // find($id) ==  where('name','amy123')->get()
        // $data = Student::where('name','amy123')->get();
        // dd($data);

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
}
