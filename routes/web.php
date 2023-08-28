<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix => dashboard','middleware' => ['auth']],function (){

    Route::get('/', function () {
        return view('welcome');});
    //USERS
    Route::get('/newUser' , [CustomerController::class , 'displayNewUserPage'])->name('displayNewUserPage');
    Route::post('/newUser' , [CustomerController::class , 'addUser'])->name('addUser');
    Route::get('/usersList' , [CustomerController::class , 'usersList'])->name('usersList');
    Route::get('/deleteUser/{customer}' , [CustomerController::class , 'delete'])->name('deleteUser');
    Route::get('/editUser/{customer}' , [CustomerController::class , 'displayEditPage'])->name('displayEditUserPage');
    Route::put('/editUser/{customer}' , [CustomerController::class , 'edit'])->name('editUser');

    //PRODUCTS
    Route::get('/newProduct' , [ProductController::class , 'displayNewProductPage'])->name('displayNewProductPage');
    Route::post('/newProduct' , [ProductController::class , 'addProduct'])->name('addProduct');
    Route::get('/productList' , [ProductController::class , 'productList'])->name('productList');
    Route::get('/deleteProduct/{id}' , [ProductController::class , 'delete'])->name('deleteProduct');
    Route::get('/editProduct/{id}' , [ProductController::class , 'displayEditProductPage'])->name('displayEditProductPage');
    Route::put('/editProduct/{id}' , [ProductController::class , 'edit'])->name('editProduct');

    //ORDERS
    Route::get('/newOrder' , [OrderController::class , 'displayNewOrderPage'])->name('displayNewOrderPage');
    Route::post('/newOrder' , [OrderController::class , 'addOrder'])->name('addOrder');
    Route::get('/ordersList' , [OrderController::class , 'ordersList'])->name('ordersList');
    Route::get('/deleteOrder/{id}' , [OrderController::class , 'deleteOrder'])->name('deleteOrder');
    Route::get('/editOrder/{id}' , [OrderController::class , 'displayEditOrderPage'])->name('displayEditOrderPage');
    Route::put('/editOrder/{id}' , [OrderController::class , 'editOrder'])->name('editOrder');




});


//AUTHENTICATION
Route::get('/register', [UserController::class , 'displayRegisterPage'])->name('displayRegisterPage');
Route::post('/register' , [UserController::class , 'register'])->name('register');

Route::get('/login', [UserController::class , 'displayLoginPage'])->name('displayLoginPage');
Route::post('/login' , [UserController::class , 'login'])->name('login');
Route::get('logout' , [UserController::class , 'logout'])->name('logout');



