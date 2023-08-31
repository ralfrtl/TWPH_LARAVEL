<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('user', [UserController::class, 'store'])->name('user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    });
});

Route::get('login', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])
    ->name('login');

