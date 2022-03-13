<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash
;

class UpdatePasswordController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.update-password')->with(['title' => 'Update password']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'oldpassword' => 'string|min:8',
            'password' => 'string|min:8|confirmed',
        ]);

        $isPasswordValid = Hash::check($request->oldpassword, Auth::user()->password);
        if (!$isPasswordValid) {
            return back()->with('status', 'The current password is incorrect');
        }
        Auth::user()->update(['password' => Hash::make($request->password)]);
        return back()->with('status', 'Password has been updated successfully');
    }
}
