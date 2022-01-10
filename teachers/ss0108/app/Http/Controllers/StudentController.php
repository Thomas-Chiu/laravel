<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Phone;
use App\Models\Love;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

use App\Repositories\StudentRepository;
use App\Repositories\PhoneRepository;
use App\Repositories\LoveRepository;
use App\Services\ArrayToStringService;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;


class StudentController extends Controller
{
    private $studentRepository;
    private $phoneRepository;
    private $loveRepository;

    public function __construct(
        StudentRepository $studentRepository,
        PhoneRepository $phoneRepository,
        LoveRepository $loveRepository
    ) {
        $this->studentRepository = $studentRepository;
        $this->phoneRepository = $phoneRepository;
        $this->loveRepository = $loveRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //.env 
        //PAGINATE_ALL = 3

        // $paginate = 10;
        $paginate = env('PAGINATE_ALL');
        $data = $this->studentRepository->getAll($paginate);
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
        $input = $request->except("_token");
        $loveArr = explode(" ", $input['love']);

        // 1.存student photo
        $file = $request->file('photo');
        $data = $this->studentRepository->addOne($input, $file);

        $student_id = $data['id'];
        // 2.存phone 
        $this->phoneRepository->addOne($input, $student_id);

        // 3.存love data
        $this->loveRepository->addOne($loveArr, $student_id);

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
        $data = $this->studentRepository->getByID($id);

        //商業邏輯1
        $arrayToStringService = new ArrayToStringService();
        $data['love'] = $arrayToStringService->arrayToString($data);

        //商業邏輯2
        ArrayToStringService::hello();
        $arrayToStringService->yearReport();
        $arrayToStringService->monthReport();
        
        
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
        // $input = $request->all();
        $input = $request->except("_token", "_method");
        $file = $request->file('photo');
        // 1.修改student data
        $this->studentRepository->updateOne($id, $input, $file);
        // 2.修改phone data 

        // 2.修改phone data 
        // 2.1 刪除 phone data
        $student_id = $id;
        $this->phoneRepository->delByID($student_id);
        // 2.2 新增 phone data
        $this->phoneRepository->addOne($input, $student_id);
        

        // 3.愛好 一對多修改
        // 3.1 先刪除 全部
        $this->loveRepository->delByID($student_id);
        // 3.2 新增 多
        $loveArr = explode(" ", $input['love']);        
        $this->loveRepository->addOne($loveArr, $student_id);

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
        $this->studentRepository->delByID($id);
        $this->phoneRepository->delByID($id);
        $this->loveRepository->delByID($id);

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
