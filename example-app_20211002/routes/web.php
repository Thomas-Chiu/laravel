<?php
// use 就像 import
use Illuminate\Support\Facades\Route;
// 匯入 request
use Illuminate\Http\Request;
// 匯入 Controller
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

// 路由命名
Route::get('/hello456', function () {
	return 'hello 123';
})->name('hello123');

// Request 處理表單 GET 參數
Route::get('/getData', function (Request $request) {
	dd($request);
	// return view('getData');
})->name('getData');

// 註冊 Controller，路徑用複數
Route::resource('tests', TestController::class);