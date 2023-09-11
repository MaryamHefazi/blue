<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/customers' , [CustomerController::class , 'customerList']);
Route::get('/customer/{customer}' , [CustomerController::class , 'show']);
Route::post('/newCustomer' , [CustomerController::class , 'newCustomer']);
Route::put('/updateCustomer/{customer}' , [CustomerController::class , 'update']);
Route::delete('/deleteCustomer/{customer}' , [CustomerController::class , 'delete']);


Route::get('/orders' , [OrderController::class , 'orderList']);
Route::get('/order/{id}' , [OrderController::class , 'show']);
Route::post('/newOrder' , [OrderController::class , 'newOrder']);
Route::put('/updateOrder/{id}' , [OrderController::class , 'update']);
Route::delete('/deleteOrder/{id}' , [OrderController::class , 'delete']);

