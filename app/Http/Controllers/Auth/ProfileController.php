<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {return view('auth.profile')->with(['title' => Auth::user()->name . ' profile']);}

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email',
            'name' => 'min:4|max:10',
        ]);

        if (Auth::user()->update($request->only('email', 'name'))) {
            return back();
        } else {
            return back()->with('status', 'Something went wrong, please try again later');
        }
    }
}
