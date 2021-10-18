<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use 就像 import，匯入 Controller
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/test', function () {
  // 利用 view() 導向 test.blade.php
  return view('test');
});

// :: 取得靜態屬性
Route::get('/abc', function () {
  return "hello ABC!";
});

// 路由帶參數
Route::get('/user/{id}/location/{location}', function ($id, $location) {
  return 'User ' . $id . ' address ' . $location;
});

// ? 預設參數值
Route::get('/user/{name?}', function ($name = "Thomas") {
  return "Hello user " . $name;
});

// 路由命名，統一管理 URL
Route::get('/hello123', function () {
  return 'hello 123';
})->name('hello123_name');

// Request 處理表單 GET 參數
Route::get('/getData', function (Request $request) {
  // dd($request);
  return view('getData');
})->name('getData');

// 註冊 Controller，路徑用複數表示，"/" 可加可不加
Route::resource('testcontrollers', TestController::class);