<?php

namespace App\Http\Controllers\calc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{

  public function __invoke(Request $request)
  {
    return view("calc.index");
  }

  public function handleCalc(Request $request)
  {
    // dd($request);
    $input = $request;
    $data = [];
    $data["num1"] = $input["num1"];
    $data["num2"] = $input["num2"];
    switch ($input["mySelect"]) {
      case '1':
        $data["mySelect"] = "+";
        $data["result"] = $data["num1"] + $data["num2"];
        break;
      case '2':
        $data["mySelect"] = "-";
        $data["result"] = $data["num1"] - $data["num2"];
        break;
      case '3':
        $data["mySelect"] = "*";
        $data["result"] = $data["num1"] * $data["num2"];
        break;
      case '4':
        $data["mySelect"] = "/";
        $data["result"] = $data["num1"] / $data["num2"];
        break;
    }

    return view("calc.result")->with("data", $data);
  }
}