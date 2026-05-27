<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display product list for POS dashboard
     */
    public function index()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect('/products')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'product_code' => $request->product_code,
            'name'         => $request->name,
            'category'     => $request->category,
            'price'        => $request->price,
            'cost_price'   => $request->cost_price,
            'stock'        => $request->stock,
            'status'       => $request->status,
            'updated_at'   => now(),
        ]);

        return redirect('/products')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products')
                ->with('success', 'Product deleted successfully');
    }

}
