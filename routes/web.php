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
    Route::get('/class-trash', [ClassController::class, 'trash'])->name('class.trash');
    Route::put('/class/{id}/restore', [ClassController::class, 'restore'])->name('class.restore');
    Route::delete('/class/{id}/force-delete', [ClassController::class, 'forceDelete'])->name('class.force-delete');

    // Subject
    Route::resource('/subject', SubjectController::class);
    Route::get('/subject-trash', [SubjectController::class, 'trash'])->name('subject.trash');
    Route::put('/subject/{id}/restore', [SubjectController::class, 'restore'])->name('subject.restore');
    Route::delete('/subject/{id}/force-delete', [SubjectController::class, 'forceDelete'])->name('subject.force-delete');

    // ClassSubjectController
    Route::get('/assign-subject', [ClassSubjectController::class, 'index'])->name('assign-subject.index');
    Route::get('/assign-subject/create', [ClassSubjectController::class, 'create'])->name('assign-subject.create');
    Route::post('/assign-subject/create', [ClassSubjectController::class, 'insert'])->name('assign-subject.insert');
    Route::get('/assign-subject/edit/{id}', [ClassSubjectController::class, 'edit'])->name('assign-subject.edit');
    Route::delete('/assign-subject/{id}', [ClassSubjectController::class, 'destroy'])->name('assign-subject.destroy');
    Route::get('/assign-subject-trash', [ClassSubjectController::class, 'trash'])->name('assign-subject.trash');
    Route::put('/assign-subject/{id}/restore', [ClassSubjectController::class, 'restore'])->name('assign-subject.restore');
    Route::delete('/assign-subject/{id}/force-delete', [ClassSubjectController::class, 'forceDelete'])->name('assign-subject.force-delete');
    Route::patch('/assign-subject/edit/{id}', [ClassSubjectController::class, 'update'])->name('assign-subject.update');
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
