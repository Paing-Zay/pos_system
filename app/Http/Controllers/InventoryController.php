<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        $category = $request->query('category');
        $status = $request->query('status');

        if ($category) {
            $query->where('category', $category);
        }

        if ($status) {
            $query->where('status', $status);
        }

        $products = $query->get();
        $categories = Product::whereNotNull('category')->distinct()->orderBy('category')->pluck('category');
        $statuses = [
            'in_stock' => 'In Stock',
            'low_stock' => 'Low Stock',
            'out_of_stock' => 'Out of Stock',
        ];

        return view('inventory', compact('products', 'categories', 'statuses', 'category', 'status'));
    }
}
