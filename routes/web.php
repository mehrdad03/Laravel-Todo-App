<?php


use App\Http\Controllers\TodoController;

use Illuminate\Support\Facades\Route;

Route::get('/todos',[TodoController::class,'index']);
