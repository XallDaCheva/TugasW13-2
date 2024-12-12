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

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/search-by-name', [ProductController::class, 'searchByName'])->name('searchByName');
Route::get('/search-by-price-not-equal', [ProductController::class, 'searchByPriceNotEqual'])->name('searchByPriceNotEqual');
Route::get('/search-by-description-like', [ProductController::class, 'searchByDescriptionLike'])->name('searchByDescriptionLike');

Route::get('/index', function () {
    $products = Product::all();
    $customers = Customer::limit(10)->get();
    // Fetch the latest transaction
    $latestTransaction = Transaction::latest()->first();
    return view('index', compact('products', 'customers', 'latestTransaction'));
});
