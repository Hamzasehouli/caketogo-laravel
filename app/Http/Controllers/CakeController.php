<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // if (Auth::user()->role !== 'admin') {
        //     return redirect()->route('home')
        // }

        if (!Gate::allows('add.cake')) {
            abort(403);
        }

        $request->validate([
            'title' => 'bail|required|string|max:255',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'description' => 'required|string|max:255|min:20',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Cake::create($request->only('title', 'price', 'weight', 'description', 'photo'));
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

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

    public function addCake()
    {
        if (!Gate::allows('add.get')) {
            abort(403);
        }
        return view('cake.create');
        // if (Auth::user()->role === 'admin') {
        //     return view('cake.create');
        // } else {
        //     return redirect()->route('home');
        // }
    }
}
