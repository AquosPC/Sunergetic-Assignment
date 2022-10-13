<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

//Home
Route::get('/', function () {
    return view('home');
});

//Show Admin page
Route::get('/admin', [CustomerController::class, 'getCustomerList']);

//Gets customer info and shows in view page
Route::get('/admin/view/{id}', [CustomerController::class, 'getCustomer']);

//Show Edit customer page
Route::get('/admin/edit/{id}', [CustomerController::class, 'showEditCustomer']);

//Updates customer information via controller to the API
Route::put('/admin/edit/customer', [CustomerController::class, 'editCustomer']);

//Show Create customer page
Route::get('/admin/create', [CustomerController::class, 'showCreateCustomer']);

//Creates customer information via controller to the API
Route::post('/admin/create/customer', [CustomerController::class, 'createCustomer']);

//Show Delete warning customer page
Route::get('/admin/delete/{id}', [CustomerController::class, 'showDeleteCustomer']);

//Deletes customer information via controller to the API
Route::delete('/admin/delete/{id}', [CustomerController::class, 'DeleteCustomer']);
