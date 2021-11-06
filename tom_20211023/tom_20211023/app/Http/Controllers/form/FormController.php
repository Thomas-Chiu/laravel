<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{

  public function index()
  {
    return view("form.index");
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

  /*
    新增自訂方法
  */

  public function handleForm(Request $request)
  {
    // 利用 $request 取得前端 formData
    // dd($request);
    $input = $request->all();
    // dd($input);
    // 傳到前端 result.blade
    return view("form.result")->with("data", $input);
  }
}