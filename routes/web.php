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
/*Customers*/
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'allCustomers'])->name('customers');
Route::get('/add-customer', [App\Http\Controllers\CustomerController::class, 'addCustomer'])->name('add-customer');
Route::post('/new-customer', [App\Http\Controllers\CustomerController::class, 'create'])->name('new-customer');
Route::get('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('edit-customer/{id}');
Route::post('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('edit-customer/{id}');
Route::get('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'deleteCustomer'])->name('delete-customer/{id}');
Route::post('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('delete-customer/{id}');
/*Elements*/
Route::get('/elements', [App\Http\Controllers\ElementController::class, 'allElements'])->name('elements');
Route::get('/add-element', [App\Http\Controllers\ElementController::class, 'addElement'])->name('add-element');
Route::post('/new-element', [App\Http\Controllers\ElementController::class, 'create'])->name('new-element');
Route::get('/edit-element/{id}', [App\Http\Controllers\ElementController::class, 'editElement'])->name('edit-element/{id}');
Route::post('/edit-element/{id}', [App\Http\Controllers\ElementController::class, 'edit'])->name('edit-element/{id}');
Route::get('/delete-element/{id}', [App\Http\Controllers\ElementController::class, 'deleteElement'])->name('delete-element/{id}');
Route::post('/delete-element/{id}', [App\Http\Controllers\ElementController::class, 'delete'])->name('delete-element/{id}');

