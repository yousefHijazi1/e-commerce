<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

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



Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/cart',[CartController::class,'addToCart']);
    Route::get('/cart/products/{userId}', [CartController::class, 'getCartProducts']);
    Route::delete('/remove/{id}',[CartController::class,'delete']);
    Route::get('/count/{user_id}',[CartController::class,'getCount']);

});

// Products Controller
Route::get('/allProducts',[ProductsController::class,'allProducts']);

Route::get('/recentProducts',[ProductsController::class,'recentProducts']);

Route::get('/productDetails/{id}',[ProductsController::class,'productDetails']);

Route::get('/products/category/{category}', [ProductsController::class, 'productsByCategory']);

Route::get('/getProductCategory/{searchItem}',[ProductsController::class,'getProductCategory']);

Route::get('/getProductsNames/{searchItem}',[ProductsController::class,'getProductsNames']);


// Auth Controller
Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

