<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MobileModelController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('welcome');
});

//login or register
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginCheck']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

// brand 
Route::middleware('auth')->group(function () {
    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/brand/create', [BrandController::class, 'create']);
    Route::post('/brand/store', [BrandController::class, 'store']);
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('/brand/update/{id}', [BrandController::class, 'update']);
    Route::get('/brand/delete/{id}', [BrandController::class, 'destroy']);
});

// MobileModel
Route::middleware('auth')->group(function () {
    Route::get('/mobile-models', [MobileModelController::class, 'index']);
    Route::get('/mobile-models/create', [MobileModelController::class, 'create']);
    Route::post('/mobile-models/store', [MobileModelController::class, 'store']);
    Route::get('/mobile-models/edit/{id}', [MobileModelController::class, 'edit']);
    Route::post('/mobile-models/update/{id}', [MobileModelController::class, 'update']);
    Route::get('/mobile-models/delete/{id}', [MobileModelController::class, 'destroy']);
});

// Admin Mobile Management
Route::middleware('auth')->group(function () {
    Route::get('/mobiles/manage', [MobileController::class, 'index']);
    Route::get('/mobiles/create', [MobileController::class, 'create']);
    Route::post('/mobiles/store', [MobileController::class, 'store']);
    Route::get('/mobiles/edit/{id}', [MobileController::class, 'edit']);
    Route::post('/mobiles/update/{id}', [MobileController::class, 'update']);
    Route::get('/mobiles/delete/{id}', [MobileController::class, 'destroy']);
});

// Customer Shop and Cart
Route::middleware('auth')->group(function () {
    Route::get('/mobiles', [CustomerController::class, 'index']);
    Route::post('/cart/add/{id}', [CustomerController::class, 'addToCart']);
    Route::get('/cart', [CustomerController::class, 'cart']);
    Route::get('/cart/remove/{id}', [CustomerController::class, 'removeFromCart']);
    Route::get('/bill', [CustomerController::class, 'bill']);
});
