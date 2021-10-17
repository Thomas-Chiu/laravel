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
        $data = "123";
       return view('car.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "car create";
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
        if ($id >= 1 && $id <=9) {
            return view('car.show')->with('id',$id);
        }else{
            return "$id error, must number 1 - 9";
        }     
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "$id";
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

    public function testFor(){
        for ($i=1; $i <= 9 ; $i++) { 
            for ($j=1; $j <= 9 ; $j++) {
                echo "$i x $j &nbsp;";
            }
            echo "<br>";
        }

    }

    public function table(){
        $data = [
            ['id'=>"s01","name"=>"amy"],
            ['id'=>"s02","name"=>"bob"],
            ['id'=>"s03","name"=>"cat"],
            
        ];
        // dd($data);
        return view("car.table")->with('data',$data);
    }
}
