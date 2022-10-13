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

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', [CustomerController::class, 'getCustomerList']);

Route::get('/admin/view/{id}', [CustomerController::class, 'getCustomer']);

Route::get('/admin/create', [CustomerController::class, 'showCreateCustomer']);

Route::get('/admin/edit/{id}', [CustomerController::class, 'showEditCustomer']);

Route::put('/admin/edit/customer', [CustomerController::class, 'editCustomer']);

Route::post('/admin/create/customer', [CustomerController::class, 'createCustomer']);

Route::get('/admin/delete/{id}', [CustomerController::class, 'showDeleteCustomer']);

Route::delete('/admin/delete/{id}', [CustomerController::class, 'DeleteCustomer']);
