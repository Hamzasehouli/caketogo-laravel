<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers()
    {
        if (!Gate::allows('get.users')) {
            abort(403);
        }

        $users = User::paginate(20);
        return view('user.users')->with(['users' => $users]);

    }
    public function getActiveUsers()
    {
        if (!Gate::allows('get.actives')) {
            abort(403);
        }

        $users = User::where('active', true)->paginate(20);
        return view('user.users')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('add.user')) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['bail', 'required', 'min:4', 'max:20'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['confirmed', 'required', 'min:8', 'max:20'],
        ]);

        if (User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $request['role'],
            'password' => Hash::make($validated['password']),
        ])) {
            return redirect()->route('home');
        } else {
            return back()->with('status', 'Adding a user has been failed');
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
        if (!Gate::allows('show.user')) {
            abort(403);
        }
        $user = User::find($id);
        return view('user.get')->with(['user' => $user, 'id' => $id]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateView(Request $request, $id)
    {
        if (!Gate::allows('update.user.view')) {
            abort(403);
        }
        return view('user.update');
    }

    public function update(Request $request, $id)
    {
        if (!Gate::allows('update.user')) {
            abort(403);
        }
        $user = User::find($id);

        if ($request->filled('name')) {
            $request->validate(['name' => ['bail', 'min:4', 'max:20']]);
            $user->name = $request->name;
        }
        if ($request->filled('email')) {
            $request->validate(['email' => ['email']]);
            $user->email = $request->email;
        }
        if ($request->filled('role')) {
            $request->validate(['role' => ['string']]);
            $user->role = $request->role;
        }
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', 'min:8', 'max:20']]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return back()->with('status', 'Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('destroy.user')) {
            abort(403);
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->route('home');
    }

    //////////////////////////////////////////
    //////////////////////////////////////////

    public function deactivate($id)
    {
        if (!Gate::allows('deactivate.user')) {
            abort(403);
        }
        $user = User::find($id);
        $user->update(['active' => false]);
        return redirect()->route('home');
    }
    public function addUserView()
    {
        if (!Gate::allows('add.view')) {
            abort(403);
        }
        return view('user.add');
    }
}
