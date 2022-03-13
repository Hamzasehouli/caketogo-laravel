<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index()
    {
        return view('cart')->with('title', 'Cart');
    }
}
