<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;

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
