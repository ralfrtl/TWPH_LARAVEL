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
Route::post('/V1/login', [JwtAuthController::class, 'login']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('/V1/logout', [JwtAuthController::class, 'logout']);
    Route::post('/V1/refresh', [JwtAuthController::class, 'refresh']);
    Route::post('/V1/me', [JwtAuthController::class, 'me']);

    Route::get('V1/user/all', [UserController::class, 'index'])
        ->name('API.V1.User.index');
    Route::get('V1/user/{id}', [UserController::class, 'show'])
        ->name('API.V1.User.show');

    Route::group(['middleware' => ['must_admin']], function ($router) {
        Route::post('V1/user/store/', [UserController::class, 'store'])
            ->name('API.V1.User.store');
        Route::delete('V1/user/delete/{id}', [UserController::class, 'destroy'])
            ->name('API.V1.User.destroy');
        Route::delete('V1/user/delete-force/{id}', [UserController::class, 'destroy_force'])
            ->name('API.V1.User.destroy_force');
    });
});




