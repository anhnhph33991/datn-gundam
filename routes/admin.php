<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashBoardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
Route::resource('categories', CategoryController::class);
