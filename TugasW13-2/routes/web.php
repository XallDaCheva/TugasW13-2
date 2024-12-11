<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;

Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('transactions', TransactionController::class);

Route::get('/index', function () {
    $products = Product::all();
    $customers = Customer::all();
    $transactions = Transaction::with(['product', 'customer'])->get();
    return view('index', compact('products', 'customers', 'transactions'));
});