<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
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


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/admin/list', [AdminController::class, 'list'])->name('list');
    Route::get('/admin/add', [AdminController::class, 'add'])->name('add');
    Route::post('/admin/add', [AdminController::class, 'insert'])->name('insert');

    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/admin/edit/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('delete');
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
