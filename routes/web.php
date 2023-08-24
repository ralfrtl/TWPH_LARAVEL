<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\newsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greet/{name?}', function (string $name = 'raf') {
//    return view('Greet');
    return 'test: ' . $name;
});

//Route::get('/news/{year}/{month?}', function (int $year, int $month = 0) {
////    return view('Greet');
//    return 'Year : ' . $year . (!empty($month) ? '<br>Month : ' . $month : '');
//});

Route::controller(newsController::class)->group(function (){
    Route::get('/news/{year}/{month?}', 'index');
});
