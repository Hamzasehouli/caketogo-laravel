<?php

namespace App\Http\Controllers;

use App\Htpp\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    }
    public function getActiveUsers()
    {
        if (!Gate::allows('get.actives')) {
            abort(403);
        }

        $users = User::where('active', true)->paginate(20);
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

        [RegisterController::class, 'store'];
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
        $user = User::where('id', $id)->first();
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
        $user = User::where('id', $id);
        $user->update($request->only());
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
        $user = User::where('id', $id);
        $user->delete();
    }

    //////////////////////////////////////////
    //////////////////////////////////////////

    public function deactivate($id)
    {
        if (!Gate::allows('deactivate.user')) {
            abort(403);
        }
        $user = User::where('id', $id);
        $user->update(['active' => false]);
    }
    public function addUserView()
    {
        if (!Gate::allows('add.view')) {
            abort(403);
        }
        return view('user.add');
    }
}
