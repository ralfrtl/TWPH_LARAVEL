<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/news/{year}/{month?}', function (string $year, string $month = '') {
//    return view('Greet');
    return 'Year : ' . $year . (!empty($month) ? '<br>Month : ' . $month : '');
});

