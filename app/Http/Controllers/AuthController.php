<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password'
        ]);
    }

    public function index()
    {
        return view('home');
    }

    public function settings()
    {
        return view('settings');
    }

    public function inventory()
    {
        return view('inventory');
    }

    public function products()
    {
        return view('products');
    }

    public function report()
    {
        return view('reports');
    }

    public function sales()
    {
        return view('sales');
    }

    public function customers()
    {
        return view('customers');
    }
}
