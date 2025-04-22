<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\SubjectController;
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

    // Class
    Route::resource('/class', ClassController::class);
    Route::get('/class/trash', [ClassController::class, 'trash'])->name('class.trash');
    Route::put('/class/{id}/restore', [ClassController::class, 'restore'])->name('class.restore');
    Route::delete('/class/{id}/force-delete', [ClassController::class, 'forceDelete'])->name('class.force-delete');

    // Subject
    Route::resource('/subject', SubjectController::class);
    Route::get('/subject/trash', [SubjectController::class, 'trash'])->name('subject.trash');
    Route::put('/subject/{id}/restore', [SubjectController::class, 'restore'])->name('subject.restore');
    Route::delete('/subject/{id}/force-delete', [SubjectController::class, 'forceDelete'])->name('subject.force-delete');

    // ClassSubjectController
    Route::get('/assign_subject', [ClassSubjectController::class, 'index'])->name('assign_subject.index');
    Route::get('/assign_subject/create', [ClassSubjectController::class, 'create'])->name('assign_subject.create');
    Route::post('/assign_subject/create', [ClassSubjectController::class, 'insert'])->name('assign_subject.insert');
    Route::get('/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit'])->name('assign_subject.edit');
    Route::patch('/assign_subject/edit/{id}', [ClassSubjectController::class, 'update'])->name('assign_subject.update');
    Route::delete('/assign_subject', [ClassSubjectController::class, 'destroy'])->name('assign_subject.destroy');
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
