<?php

use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\JwtAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('auth/V1/login', [JwtAuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('auth/V1/logout', [JwtAuthController::class, 'logout'])
        ->name('api.v1.auth.logout');
    Route::post('auth/V1/refresh', [JwtAuthController::class, 'refresh'])
        ->name('api.v1.auth.refresh');
    Route::post('auth/V1/me', [JwtAuthController::class, 'me'])
        ->name('api.v1.auth.me');

    Route::get('V1/user/all', [UserController::class, 'index'])
        ->name('api.v1.user.index');
    Route::get('V1/user/{id}', [UserController::class, 'show'])
        ->name('api.v1.user.show');

    Route::group(['middleware' => ['must_admin']], function () {
        Route::post('V1/user/store/', [UserController::class, 'store'])
            ->name('api.v1.user.store');
        Route::delete('V1/user/delete/{id}', [UserController::class, 'destroy'])
            ->name('api.v1.user.destroy');
        Route::delete('V1/user/delete-force/{id}', [UserController::class, 'destroyForce'])
            ->name('api.v1.user.destroy.force');
    });
});




