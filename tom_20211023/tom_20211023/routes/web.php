<?php

use App\Http\Controllers\calc\CalculatorController;
use App\Http\Controllers\form\FormController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\multi\MultiplicationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
});

/* 
  form 表單 
*/
Route::get("/forms/handle", [FormController::class, "handleForm"])->name("handle");
Route::resource("forms", FormController::class);

/* 
  calculator 計算機 
*/
Route::get("/calc", CalculatorController::class);
// Route::get("/calc/handle", [CalculatorController::class, "handleCalc"])->name("handleCalc");
Route::post("/calc/handle", [CalculatorController::class, "handleCalc"])->name("handleCalc");

/* 
  multiplication 乘法表 
*/
Route::get("/multi/handle", [MultiplicationController::class, "handleMulti"])->name("handleMulti");
Route::resource("multi", MultiplicationController::class);

/* 
  blade layout 
*/
Route::resource("layout", LayoutController::class);