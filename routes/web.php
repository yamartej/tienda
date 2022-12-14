<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/order',[OrderController::class,'index']);

Route::post('/order/create',[OrderController::class,'create']);

Route::post('/order/confirm',[OrderController::class,'confirm']);

Route::post('/order/store',[OrderController::class,'store']);

Route::post('/order/order-user',[OrderController::class,'order-user']);

Route::post('/order/update',[OrderController::class,'update']);

Route::get('/order/response/{id}', [OrderController::class,'response']);

Route::get('/order/list',[OrderController::class,'list']);

