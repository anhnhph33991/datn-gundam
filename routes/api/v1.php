<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    //Đăng xuất
    Route::post('/logout', [AuthController::class, 'logout']);
    
});

// Tạo tài khoản 
Route::post('/signUp', [AuthController::class, 'signUp']);

// Đăng nhập
Route::post('/signIn', [AuthController::class, 'signIn']);

// Sản phẩm nổi bật
Route::get('/getTopProducts', [ProductController::class, 'getTopProducts']);

// Danh sách sản phẩm
Route::get('/getPagination', [ProductController::class, 'getPagination']);

// Chi tiết sản phẩm
Route::get('{slug}/productDetail', [ProductController::class, 'productDetail']);
