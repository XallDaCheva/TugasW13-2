<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'customer'])->get();
        return view('index', ['transactions' => $transactions]);
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('transactions.create', compact('products', 'customers'));
    }

    public function store(Request $request)
    {
        Transaction::create($request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'transaction_date' => 'required|date',
            'quantity' => 'required|integer',
            'total_amount' => 'required|numeric'
        ]));
        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('transactions.edit', compact('transaction', 'products', 'customers'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'transaction_date' => 'required|date',
            'quantity' => 'required|integer',
            'total_amount' => 'required|numeric'
        ]));
        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}
