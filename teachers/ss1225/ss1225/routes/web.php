<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\LoveController;
use App\Http\Controllers\CarController;




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

// students 學生
Route::get('students/export/', [StudentController::class, 'exportView'])->name('students.export');
// Route::get('students/export/', [StudentController::class, 'export'])->name('students.export');
Route::get('create-file', [StudentController::class, 'createFile'])->name('students.create-file');
Route::post('store-file', [StudentController::class, 'storeFile'])->name('students.store-file');
// Route::DELETE('store-file', [StudentController::class, 'storeFile'])->name('students.store-file');


Route::resource('students', StudentController::class);
Route::resource('phones', PhoneController::class);
Route::resource('loves', PhoneController::class);

Route::resource('cars', CarController::class);

Route::get('/', function () {
    // return view('welcome');
});
