<?php

namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email' => ['email', 'required'],
            'password' => ['confirmed', 'required', 'min:8', 'max:20'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        Auth::attempt($validated);
        return redirect()->route('home');
    }
}