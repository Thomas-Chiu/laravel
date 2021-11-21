<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
  public function __invoke(Request $request)
  {
    return "我是單一 __invoke controller";
  }

  // 也可新增其他自定義函式
  public function test(Request $request)
  {
    return "我是單一 test controller";
  }
}