<?php

namespace App\Http\Controllers;

use App\Htpp\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Gate;

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

        $users = User::find();
    }
    public function getActiveUsers()
    {
        if (!Gate::allows('get.actives')) {
            abort(403);
        }

        $users = User::where('active', true)->all();
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
    public function updateDataView(Request $request, $id)
    {
        if (!Gate::allows('updateDataView.user')) {
            abort(403);
        }
        $user = User::where('id', $id);
        $user->update($request->only());
    }
    public function updateData(Request $request, $id)
    {
        if (!Gate::allows('updateData.user')) {
            abort(403);
        }
        $user = User::where('id', $id);
        $user->update($request->only());
    }
    public function updatePassword(Request $request, $id)
    {
        if (!Gate::allows('updatePassword.user')) {
            abort(403);
        }
        $user = User::where('id', $id);
        $user->update($request->only());
    }
    public function updatePasswordView(Request $request, $id)
    {
        if (!Gate::allows('updatePasswordView.user')) {
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
}
