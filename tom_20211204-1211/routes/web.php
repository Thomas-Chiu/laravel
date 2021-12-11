<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

/** 
 * 20211204 上傳照片
 */

// students
Route::get("create-file", [StudentController::class, "createFile"])->name("students.create-file");
Route::post("/store-file", [StudentController::class, "storeFile"])->name("students.store-file");

// 資源控制器在註冊時，URI 就是 route name
Route::resource("students", StudentController::class);
Route::resource("phones", PhoneController::class);
Route::resource("loves", PhoneController::class);