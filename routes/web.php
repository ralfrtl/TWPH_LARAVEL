<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserListController;
use App\Http\Controllers\User\UserViewController;
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

    Route::group(['middleware' => ['must_admin']], function () {
        Route::get('/userlist', [UserListController::class, 'index']);
        Route::get('/userview/{id?}', [UserViewController::class, 'index']);

        Route::get('/register', [RegisterController::class, 'index']);
        Route::post('/register', [RegisterController::class, 'create'])
            ->name('register');
    });
});

Route::get('login', [LoginController::class,'showLoginForm']);
Route::post('login', [LoginController::class,'login'])
    ->name('login');

