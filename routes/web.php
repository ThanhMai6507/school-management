<?php

use Illuminate\Support\Facades\Route;

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

Route::get('grades', [\App\Http\Controllers\GradeController::class, 'index'])->name('grades.index');
Route::get('grades/create', [\App\Http\Controllers\GradeController::class, 'create'])->name('grades.create');
Route::post('grades/store', [\App\Http\Controllers\GradeController::class, 'store'])->name('grades.store');
Route::get('grades/edit/{id}', [\App\Http\Controllers\GradeController::class, 'edit'])->name('grades.edit');
Route::put('grades/update/{id}', [\App\Http\Controllers\GradeController::class, 'update'])->name('grades.update');
Route::delete('grades/delete/{id}', [\App\Http\Controllers\GradeController::class, 'delete'])->name('grades.delete');
