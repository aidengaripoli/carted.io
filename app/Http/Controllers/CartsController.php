<?php

namespace App\Http\Controllers;

use App\Cart;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $carts = Cart::active()->get();
        return view('carts.index', compact('carts'));
    }

    public function show(Cart $cart)
    {
        return view('carts.show', compact('cart'));
    }
}
