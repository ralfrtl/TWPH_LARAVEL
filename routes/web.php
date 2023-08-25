<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['login' => false, 'register' => false]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@create')
        ->name('register');
});

Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')
    ->name('login');

