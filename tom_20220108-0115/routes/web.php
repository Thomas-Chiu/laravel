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

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

/**
 * 導入原專案 web.php
 */

//  中介層群組寫法
Route::middleware(["auth"])->group(function () {
  Route::get("create-file", [StudentController::class, "createFile"])->name("students.create-file");
  Route::post("/store-file", [StudentController::class, "storeFile"])->name("students.store-file");
  Route::get('students/export/', [StudentController::class, "export"])->name("students.export");
  Route::get('students/exportPhone/', [StudentController::class, "exportPhone"])->name("students.exportPhone");

  Route::resource("students", StudentController::class);
  Route::resource("phones", PhoneController::class);
  Route::resource("loves", LoveController::class);
});