<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/index',[TodoController::class,'index'])->name('index');
    Route::post('/todos',[TodoController::class,'store'])->name('store');
    Route::get('/todos/edit/{id}',[TodoController::class,'edit'])->name('edit');
    Route::put('/todos/update/{id}',[TodoController::class,'update'])->name('update');
    Route::delete('/todos/delete/{id}',[TodoController::class,'destroy'])->name('delete');
});

require __DIR__.'/auth.php';
