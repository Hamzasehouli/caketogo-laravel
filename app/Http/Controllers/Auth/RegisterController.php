<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register')->with(['title' => 'Signup']);
    }

    /////////////////////
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['bail', 'required', 'min:4', 'max:20'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['confirmed', 'required', 'min:8', 'max:20'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        } else {
            return back()->with('status', 'Sign up has been failed');
        }

    }
}
