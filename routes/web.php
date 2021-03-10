<?php

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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'allCustomers'])->name('customers');
Route::get('/add-customer', [App\Http\Controllers\CustomerController::class, 'addCustomer'])->name('add-customer');
Route::post('/new-customer', [App\Http\Controllers\CustomerController::class, 'create'])->name('new-customer');
Route::get('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('edit-customer/{id}');
Route::post('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('edit-customer/{id}');
Route::get('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'deleteCustomer'])->name('delete-customer/{id}');
Route::post('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('delete-customer/{id}');

