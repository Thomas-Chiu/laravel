<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookController;


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


/*
 *books 書本相關
 * 
 */
Route::resource('books', BookController::class);

/*
 *cars 汽車相關的
 * 
 */
Route::get('/index99', [CarController::class, 'index99']);
Route::post('/result99', [CarController::class, 'result99'])->name('cars.result99');

Route::get('/cars/table', [CarController::class, 'table']);
Route::get('/cars/formData', [CarController::class, 'formData'])->name('formData');
Route::post('/cars/formData', [CarController::class, 'formDataPost'])->name('formDataPost');
Route::resource('cars', CarController::class);

Route::get('/', function () {
    return view('welcome');
});
