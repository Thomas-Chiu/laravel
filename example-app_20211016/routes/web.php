<?php

use App\Http\Controllers\Admin\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SingleController;

Route::get('/', function () {
  $url = route("abc.dev_page1");
  echo $url . "<br>";
  echo $url . "<br>";
  // dd() 可當斷點 debug 用
  dd($url);
  echo $url . "<br>";
  echo $url . "<br>";

  // return view('welcome');
});

// 練習 2: 導向 front 頁面後放兩個 <a> 連結 (page1、2)
Route::get('/front', function () {
  return view('car.front');
})->name('front_name');

Route::get('/page1', function () {
  return view('car.page1');
})->name('page1_name');

Route::get('/page2', function () {
  return view('car.page2');
})->name('page2_name');

// 練習 3: 利用網址 GET 參數回覆
Route::get("/user/{id}/name/{name}", function ($id, $name) {
  // '' 單引號放字串 "" 雙引號可放變數
  return "<h1> Hello $id $name </h1>";
});

// 練習 4: Route Prefixes 路由前綴
// Route::prefix("dev")->group(function () {
//   Route::get("/dev_page1", function () {
//     return view("dev.dev_page1");
//   });

//   Route::get("/dev_page2", function () {
//     return view("dev.dev_page2");
//   });
// });

// 練習 5: Route Name Prefixes 路由名稱字首
Route::prefix("dev")->name("abc.")->group(function () {
  Route::get("/dev_page1", function () {
    // URL = /dev/dev_page1，路由名稱 = abc.dev_page1
    return view("dev.dev_page1");
  })->name("dev_page1");

  Route::get("/dev_page2", function () {
    // URL = /dev/dev_page2，路由名稱 = abc.dev_page2
    return view("dev.dev_page2");
  })->name("dev_page2");
});


// controller 通常會放在後面 
// 練習 6: 自訂單一 method 的 controller
Route::get('/single', SingleController::class);
Route::get('/single2', [SingleController::class, "test"]);

// 練習 1: 建立 controller CarController 
// 再從 CarController 導向 views 畫面
Route::resource('cars', CarController::class);
Route::resource('photos', PhotoController::class);

// 練習 7: 用 URL 方式導向 CarController 的 method
// Resource Controllers, index, create, show, edit