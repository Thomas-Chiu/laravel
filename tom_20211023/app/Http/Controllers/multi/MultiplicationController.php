<?php

namespace App\Http\Controllers\multi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MultiplicationController extends Controller
{

  public function index()
  {
    return view("multi.index");
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
  /* 自訂方法 */
  public function handleMulti(Request $request)
  {
    // dd($request);
    $input = $request->all();

    return view("multi.result")->with("data", $input);
  }
}