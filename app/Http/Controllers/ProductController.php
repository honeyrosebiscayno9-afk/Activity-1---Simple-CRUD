<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // READ (Display all products)
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // CREATE (Save new product)
    public function store(Request $request)
    {
        // Validation (important!)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        return redirect()->back()->with('success', 'Product updated successfully!');
    }
}