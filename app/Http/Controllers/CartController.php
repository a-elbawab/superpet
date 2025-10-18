<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkout()
    {
        return view('frontend.cart.checkout');
    }
}
