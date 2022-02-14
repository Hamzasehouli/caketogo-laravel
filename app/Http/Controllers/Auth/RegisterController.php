<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{   
    
    public function index()
    {
        return dd('index');
    }

    /////////////////////
    public function store(Request $request)
    {
        return dd('request');
    }
}
