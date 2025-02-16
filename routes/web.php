<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'Authlogin']);
Route::post('/logout', [AuthController::class, 'Authlogout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'ForgotPassword']);
Route::post('/forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('/reset/{token}', [AuthController::class, 'ResetPassword']);
Route::post('/reset/{token}', [AuthController::class, 'PostResetPassword']);


// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/admin/list', function () {
        return view('admin.admin.list');
    });
});

// Student
Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['student']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});

// Instructor
Route::group(['prefix' => 'instructor', 'as' => 'instructor.', 'middleware' => ['instructor']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});

// Parent
Route::group(['prefix' => 'parent', 'as' => 'parent.', 'middleware' => ['parent']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
});
