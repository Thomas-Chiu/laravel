<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::resource('tests', TestController::class);

// 老闆要求去url /aaa 去test view

Route::get('/ccc', function () {    
    return view('test');
})->name('go_test');

Route::get('/init', function () {    
    return view('init');
});

//use Illuminate\Http\Request;

// Route::get('/', function () {
//      $url = route('get_data');
//     return $url;
// });

// Route::get('/test', function () {

//     return view('test');
// })->name('test');

// Route::get('/get_data', function (Request $request) {
//     dd($request);
//     //return view('getData');
// })->name('get_data');


//皮膚科
// Route::get('/皮膚科/掛號', function () {
//     return view('test1');
// });

// Route::get('/皮膚科/拿藥', function () {
//     return view('test2');
// });




// Route::get('/abc', function () {
//     return "hello 123";
// })->name('abc123');

// // Route::get('/abc', function () {
// //     return "hello abc";
// // })->name('abc123');


// Route::get('/user/{id}/location/{location}', function ($id,$location) {
//     return 'User '.$id." address ".$location;
// });


// 練習
// localhost/php/31/location/taipei
// location/

// hello php student 31 :))