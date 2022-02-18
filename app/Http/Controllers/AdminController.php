<?php

namespace App\Http\Controllers;

use App\models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['email', 'required', 'unique:admin'],
            'password' => ['confirmed', 'required', 'min:8', 'max:20'],
        ]);

        Admin::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        } else {
            return back()->with('status', 'Sign up has been failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required', 'min:8', 'max:20'],
        ]);

        $user = Admin::where('email', $request['email'])->first();

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}