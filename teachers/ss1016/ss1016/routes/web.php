<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\Admin\PhotoController;

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

// 練習五
// cars 增加一個method public function test()


// Route::get('/single123', SingleController::class);

Route::get('/single123', [SingleController::class, 'single123']);

// 練習四
// /dev/front a tag
// /dev/dev_page1
// /dev/dev_page2
// dev_page1 and dev_page 都有a tag 可以回dev page
// rounting prefix
Route::prefix('dev')->name('dev.')->group(function () {
    Route::get('/dev_page1', function () {
        return view('dev.dev_page1');
    })->name('dev_page1_name');

    Route::get('/dev_page2', function () {
        return view('dev.dev_page2');
    })->name('dev_page2_name');
});

/*
 * xxxcontroller 員工 
 */
// Route::get('/single123', [SingleController::class, 'single123']);
// Route::resource('stores', SingleController::class);

/*
 * xxxcontroller 店家
 */
// Route::get('/single123', [SingleController::class, 'single123']);
// Route::resource('stores', SingleController::class);

/*
 * xxxcontroller 商品
 */
// Route::get('/single123', [SingleController::class, 'single123']);
// Route::resource('stores', SingleController::class);

// Route::resources([
//     'stores' => StoreController::class,
//     'photos' => PhotoController::class,
//     'cars' => CarController::class,
// ]);



//練習3
// /user/55688/name/kai
// hello 55688 kai :))

Route::get('/user/{id}/name/{name}', function ($id, $name) {
    return "hello $id $name";
});

//練習 2
//結果
//view
//car.front
//car.page1
//car.page2

//進去front頁面後
//go_page1 a tag => page1
//go_page2 a tag => page2

//3 blade
//front
//page1
//page2

//route
//get /front
//get /page1
//get /page2


//建立controller CarController
// /cars -> index  return hello car index

// /admin/photos

/*
 *員工
 */
Route::get('/front', function () {
    return view('car.front');
})->name('front_name');

Route::get('/page1', function () {
    return view('car.page1');
})->name('page1_name');

Route::get('/page2', function () {
    return view('car.page2');
})->name('page2_name');

//page1 page2  a tag back front


Route::get('/car_test', [CarController::class, 'testFor']);
Route::get('/car_table', [CarController::class, 'table']);
Route::resource('cars', CarController::class);

Route::resource('photos', PhotoController::class);

Route::get('/', function () {
    
    $url = route('dev.dev_page1_name');
    echo $url."<br>";
    echo $url."<br>";
    echo $url."<br>";
    echo $url."<br>";
    dd($url);
    
    //return view('welcome');
});



// 練習七
// url 
// method
// index
// create
// show
// edit
