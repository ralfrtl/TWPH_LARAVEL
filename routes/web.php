<?php

use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserController;
use App\Jobs\BirthdayGreetingJob;
use App\Models\Employee;
use Carbon\Carbon;
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

Auth::routes(['login' => false, 'user/create' => false]);

Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login.index');
Route::post('login', [LoginController::class, 'login'])
    ->name('login');

Route::get('about/', [AboutController::class, 'index'])
    ->name('about.index');
Route::post('about/send', [AboutController::class, 'send'])
    ->name('about.send');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::group(['middleware' => ['must_admin']], function ($router) {
        Route::get('user/', [UserController::class, 'index'])
            ->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])
            ->name('user.create');
        Route::get('user/{id}', [UserController::class, 'show'])
            ->name('user.show');
        Route::post('user', [UserController::class, 'store'])
            ->name('user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])
            ->name('user.edit');
        Route::put('user/{id}', [UserController::class, 'update'])
            ->name('user.update');
        Route::get('user/delete/{id}', [UserController::class, 'destroy'])
            ->name('user.destroy');

        Route::get('send_test_email_view', function () {
            return view('mail.response');
        });

        Route::get('send_test_email', function () {
            dispatch(new BirthdayGreetingJob());

            $employees = Employee::whereMonth('employee.date_of_birth', Carbon::now()->format('m'))
                ->whereDay('employee.date_of_birth', Carbon::now()->format('d'))
                ->get();

            foreach ($employees as $employee) {
                echo 'email : ' . $employee->user->email;
                echo '<br>';
            }

            echo Carbon::now();
            echo '<br>';
            echo 'job dispatched';
        });
    });
});

