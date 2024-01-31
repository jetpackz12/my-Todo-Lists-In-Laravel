<?php

use App\Http\Controllers\TodoController;
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


Route::get('/', [TodoController::class, 'index']);

Route::post('/todo/store', [TodoController::class, 'store'])->name('store');

Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('edit');

Route::put('/todo/update', [TodoController::class, 'update'])->name('update');

Route::delete('/todo/delete/{id}', [TodoController::class, 'destroy'])->name('delete');

Route::delete('/todo/delete_all', [TodoController::class, 'destroy_all'])->name('delete_all');
