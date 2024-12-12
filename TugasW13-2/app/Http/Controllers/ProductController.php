<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer'
        ]));
        return view('index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer'
        ]));
        return redirect()->route('index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('index');
    }

    public function searchByName(Request $request) {
        $name = $request->input('name');
        $products = Product::where('name', '=', $name)->get();
        return view('products.hasilSearch', compact('products'));
    }
    
    public function searchByPriceNotEqual(Request $request) {
        $price = $request->input('price');
        $products = Product::where('price', '!=', $price)->get();
        return view('products.hasilSearch', compact('products'));
    }
    
    public function searchByDescriptionLike(Request $request) {
        $description = $request->input('description');
        $products = Product::where('description', 'LIKE', "%$description%")->get();
        return view('products.hasilSearch', compact('products'));
    }
}
