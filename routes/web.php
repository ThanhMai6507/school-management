<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('grades')->name('grades.')->group(function () {
    Route::get('', [GradeController::class, 'index'])->name('index');
    Route::get('create', [GradeController::class, 'create'])->name('create');
    Route::post('store', [GradeController::class, 'store'])->name('store');
    Route::get('edit/{id}', [GradeController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [GradeController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [GradeController::class, 'delete'])->name('delete');
});

Route::prefix('classrooms')->name('classrooms.')->group(function () {
    Route::get('', [ClassroomController::class, 'index'])->name('index');
    Route::get('create', [ClassroomController::class, 'create'])->name('create');
    Route::post('store', [ClassroomController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ClassroomController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [ClassroomController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [ClassroomController::class, 'delete'])->name('delete');
});

Route::prefix('students')->name('students.')->group(function () {
    Route::get('', [StudentController::class, 'index'])->name('index');
    Route::get('create', [StudentController::class, 'create'])->name('create');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('{id}/update', [StudentController::class, 'update'])->name('update');
    Route::delete('{id}/delete', [StudentController::class, 'delete'])->name('delete');

    Route::prefix('{studentId}/subjects')->name('subjects.')->group(function () {
        Route::get('', [StudentController::class, 'subjects'])->name('index');
        Route::get('attach', [StudentController::class, 'attachSubject'])->name('attach');
        Route::post('attach', [StudentController::class, 'doAttachSubject']);
        Route::delete('{subjectId}', [StudentController::class, 'deleteSubject'])->name('delete');
    });
});

Route::prefix('subjects')->name('subjects.')->group(function () {
    Route::get('', [SubjectController::class, 'index'])->name('index');
    Route::get('create', [SubjectController::class, 'create'])->name('create');
    Route::post('store', [SubjectController::class, 'store'])->name('store');
    Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [SubjectController::class, 'update'])->name('update');
    Route::delete('delete/{id}', [SubjectController::class, 'delete'])->name('delete');
    Route::get('{id}/students', [SubjectController::class, 'students'])->name('students');
});
