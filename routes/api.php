<?php

use App\Http\Controllers\API\V1\HelloWorldAPIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('V1/user/{id?}', [HelloWorldAPIController::class, 'index'])
    ->name('HelloWorldAPI.index');
Route::post('V1/user/store/', [HelloWorldAPIController::class, 'store'])
    ->name('HelloWorldAPI.store');
Route::delete('V1/user/delete/{id}', [HelloWorldAPIController::class, 'destroy'])
    ->name('HelloWorldAPI.destroy');
Route::delete('V1/user/delete-force/{id}', [HelloWorldAPIController::class, 'destroy_force'])
    ->name('HelloWorldAPI.destroy_force');

