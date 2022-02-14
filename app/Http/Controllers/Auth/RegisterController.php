<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

    /////////////////////
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['bail', 'required', 'min:4', 'max:20'],
            'email' => ['email', 'required', 'min:4', 'max:20'],
            'password' => ['password_confirmation', 'required', 'min:8', 'max:20'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('home');

    }
}
