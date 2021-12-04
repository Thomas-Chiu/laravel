<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

// 資源控制器在註冊時，URI 就是 route name
Route::resource("students", StudentController::class);
Route::resource("phones", PhoneController::class);
Route::resource("loves", PhoneController::class);