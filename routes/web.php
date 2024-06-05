<?php


use App\Http\Controllers\TodoController;

use Illuminate\Support\Facades\Route;

Route::get('/',[TodoController::class,'index'])->name('index');

Route::post('/todos',[TodoController::class,'store'])->name('store');
Route::get('/todos/edit/{id}',[TodoController::class,'edit'])->name('edit');
Route::put('/todos/update/{id}',[TodoController::class,'update'])->name('update');
Route::delete('/todos/delete/{id}',[TodoController::class,'destroy'])->name('delete');


