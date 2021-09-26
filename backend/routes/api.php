<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WareHouseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::prefix('v1')->group(function() {
    Route::middleware('auth:api')->group(function(){
        Route::post('logout', [UserController::class, 'logout']);
        Route::get('/user', [UserController::class, 'show']);
        Route::resource('warehouses', WareHouseController::class);
        Route::resource('products', ProductController::class);
        
    }); 
});
