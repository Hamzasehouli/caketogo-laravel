<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

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

        $user = User::where('email', $request['email'])->first();

        if (!$user) {
            return back()->with('status', 'No user found with this email');
        }

        $isPasswordValidated = Hash::check($request->password, $user['password']);
        if (!$isPasswordValidated) {
            return back()->with('status', 'Password is incorrect');
        }

        if (Auth::attempt($request->only('email', 'password'))) {

            return redirect()->route('home');
        } else {
            return back()->with('status', 'Invalid credentials');
        }
    }
}