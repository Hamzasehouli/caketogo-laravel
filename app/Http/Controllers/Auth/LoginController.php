<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    /////////////////////
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'min:8', 'max:20'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back();
        }

        $isPasswordValid = Hash::check($request->password, $user['password']);

        if (!$isPasswordValid) {
            return back();
        }

        Auth::attempt($request->only('email', 'password'));
        return redirect()->route('home');
    }
}