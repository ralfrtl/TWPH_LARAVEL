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
Route::group(['middleware' => 'cors'], function () {
    Route::prefix('v1')->group(function () {
        Route::post('auth/login', [JwtAuthController::class, 'login'])
            ->name('api.v1.auth.login');

        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('auth/logout', [JwtAuthController::class, 'logout'])
                ->name('api.v1.auth.logout');
            Route::post('auth/refresh', [JwtAuthController::class, 'refresh'])
                ->name('api.v1.auth.refresh');
            Route::post('auth/me', [JwtAuthController::class, 'me'])
                ->name('api.v1.auth.me');

            Route::get('user/all', [UserController::class, 'index'])
                ->name('api.v1.user.index');
            Route::get('user/{id}', [UserController::class, 'show'])
                ->name('api.v1.user.show');

            Route::group(['middleware' => ['must_admin']], function () {
                Route::post('user/store/', [UserController::class, 'store'])
                    ->name('api.v1.user.store');
                Route::delete('user/delete/{id}', [UserController::class, 'destroy'])
                    ->name('api.v1.user.destroy');
                Route::delete('user/delete-force/{id}', [UserController::class, 'destroyForce'])
                    ->name('api.v1.user.destroy.force');
            });
        });
    });

    Route::prefix('v2')->group(function () {
    });
});




