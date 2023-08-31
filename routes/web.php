<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
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
    Route::get('home', function () {
        return view('home');
    });

    Route::group(['middleware' => ['must_admin']], function () {
        Route::get('userlist', [UserListController::class, 'index']);
        Route::get('userview/{id?}', [UserViewController::class, 'index']);

        Route::get('register', [EmployeeController::class, 'index']);
        Route::post('register/create', [EmployeeController::class, 'store'])
            ->name('register.create');

        Route::get('register/edit/{id}', [EmployeeController::class, 'show']);
        Route::put('register/edit', [EmployeeController::class, 'update'])
            ->name('register.edit');

        Route::get('register/show/{id}', [EmployeeController::class, 'show']);
    });
});

Route::get('login', [LoginController::class,'showLoginForm']);
Route::post('login', [LoginController::class,'login'])
    ->name('login');

