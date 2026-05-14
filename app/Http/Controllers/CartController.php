<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $cartItems = json_decode($request->cart_data, true);

        return view('cart', compact('cartItems'));
    }

    public function index()
    {
        $cartItems = session()->get('cart', []);

        return view('cart', compact('cartItems'));
    }
}
