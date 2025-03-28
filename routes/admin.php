<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);

Route::get('comments', [CommentController::class, 'index'])->name('comments.index');

Route::resource('products', ProductController::class);
Route::resource('product-sizes', ProductSizeController::class);
Route::resource('product-colors', ProductColorController::class);
