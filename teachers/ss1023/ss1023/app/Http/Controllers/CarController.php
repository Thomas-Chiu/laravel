<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('car.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function table(){
        $myArr['myArr'] = [
            ['id'=>'s01', 'name'=>'amy'],
            ['id'=>'s02', 'name'=>'bob'],
            ['id'=>'s03', 'name'=>'cat']
        ];
        $test = 'hello test';

        $myArr['test'] = $test;

        return view('car.result')->with('data',$myArr);
    }
    
    public function formData(Request $request){
        // dd($request);
        // $input = $request->except('num1');
        $input = $request->all();
        // dd($input);
        $data=[];
        $data['num1'] = $input['num1'];
        $data['num2'] = $input['num2'];
        switch ($input['mySelect']) {
            case '1':
                $data['mySelect'] = '+';
                $data['result'] = $data['num1'] + $data['num2'];
                break;
            case '2':
                $data['mySelect'] = '-';
                $data['result'] = $data['num1'] - $data['num2'];
                break;
            case '3':
                $data['mySelect'] = '*';
                $data['result'] = $data['num1'] * $data['num2'];
                break;
            case '4':
                $data['mySelect'] = '/';
                $data['result'] = $data['num1'] / $data['num2'];
                break;
        }
        return view('car.calResult')->with('data',$data);
        // dd($data);
        //$data['num1']
        //$data['num2']
        //$data['mySelect']
        //$data['result']
    }

    public function formDataPost(Request $request)
    {
        // $input = $request->all();
        $input = $request->except('_token','num1');
        dd($input);
    }

    public function index99(){
        return view('car.index99');
    }


    public function result99(Request $request){
        $input = $request->except('_token');
        $data['num1'] = $input['num1'];
        $data['num2'] = $input['num2'];        
        return view('car.result99')->with('data',$data);
    }
    
}
