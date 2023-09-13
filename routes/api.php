<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::post('/login' , [UserController::class , 'login']);
Route::middleware('auth:sanctum')->post('/logout' , [UserController::class , 'logout']);


Route::get('/customers/{id?}' , [CustomerController::class , 'customersList']);
Route::post('/newCustomer' , [CustomerController::class , 'newCustomer']);
Route::put('/updateCustomer/{id}' , [CustomerController::class , 'update']);
Route::delete('/deleteCustomer/{id}' , [CustomerController::class , 'delete']);


Route::get('/orders/{id?}' , [OrderController::class , 'ordersList']);
Route::post('/newOrder' , [OrderController::class , 'newOrder']);
Route::put('/updateOrder/{id}' , [OrderController::class , 'update']);
Route::delete('/deleteOrder/{id}' , [OrderController::class , 'delete']);


Route::get('/products/{id?}' , [ProductController::class , 'productsList']);
Route::post('/newProduct' , [ProductController::class , 'newProduct']);
Route::put('/updateProduct/{id}' , [ProductController::class , 'update']);
Route::delete('/deleteProduct/{id}' , [ProductController::class , 'delete']);


Route::get('/products/{id?}' , [FactureController::class , 'factureList']);
Route::post('/newProduct' , [FactureController::class , 'newFacture']);
Route::put('/updateProduct/{id}' , [FactureController::class , 'update']);
Route::delete('/deleteProduct/{id}' , [FactureController::class , 'delete']);


Route::get('/opportunities/{id?}' , [ OpportunityController::class , ' opportunitiesList']);
Route::post('/newOpportunity' , [ OpportunityController::class , 'newOpportunity']);
Route::put('/updateOpportunity/{id}' , [ OpportunityController::class , 'update']);
Route::delete('/deleteOpportunity/{id}' , [ OpportunityController::class , 'delete']);
