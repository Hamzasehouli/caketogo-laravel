<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class CakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(?string $category = null)
    {
        $cakes = isset($category) ? Cake::where('category', $category)->paginate(5) : Cake::paginate(10);
        return view('cake.getall')->with(['cakes' => $cakes]);
    }

    public function getBestSelling()
    {
        $cakes = Cake::where('category', 'best-selling')->getall();
        return $cakes;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
        function getImagePath(Int $num)
        {
            $chars = 'qwertzuioplkjhgfdsayxcvbnmQWERTZUIOPLKJHGFDSAYXCVBNM1234567890';
            $imagePath = '';
            for ($i = 0; $i < $num; $i++) {
                $randomNum = rand(0, strlen($chars) - 1);
                $imagePath .= $chars[$randomNum];
            }
            return $imagePath;
        }
        $imagePath = getImagePath(20) . '-' . time() . '.' . $request->photo->extension();
        $request->photo->move('public_path', $imagePath);
        Cake::create(['title' => $request->title, 'catgory' => $request->category, 'price' => $request->price, 'weight' => $request->weight, 'description' => $request->description, 'photo' => $imagePath]);
        return back()->with('status', 'Cakes has been added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (!Gate::allows('store.cake')) {
            abort(403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cake)
    {
        return view('cake.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cake)
    {
        if (!Gate::allows('edit.cake')) {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cake)
    {
        if (!Gate::allows('update.cake')) {
            abort(403);
        }

        $thecake = Cake::find($cake);
        // $request->validate([
        //     'title' => 'bail|string|max:255',
        //     'price' => 'numeric',
        //     'weight' => 'numeric',
        //     'description' => 'string|max:255|min:20',
        //     'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        if ($request->filled('title')) {
            $request->validate(['title' => 'bail|string|max:255']);
            $thecake->title = $request->title;
        }
        if ($request->filled('price')) {
            $request->validate(['price' => 'numeric']);
            $thecake->price = $request->price;
        }
        if ($request->filled('weight')) {
            $request->validate(['weight' => 'numeric']);
            $thecake->weight = $request->weight;
        }
        if ($request->filled('description')) {
            $request->validate(['description' => 'string|max:255|min:20']);
            $thecake->description = $request->description;
        }
        if ($request->hasFile('photo')) {
            $request->validate(['photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            function getImagePath(Int $num)
            {
                $chars = 'qwertzuioplkjhgfdsayxcvbnmQWERTZUIOPLKJHGFDSAYXCVBNM1234567890';
                $imagePath = '';
                for ($i = 0; $i < $num; $i++) {
                    $randomNum = rand(0, strlen($chars) - 1);
                    $imagePath .= $chars[$randomNum];
                }
                return $imagePath;
            }
            $imagePath = getImagePath(20) . '-' . time() . '.' . $request->photo->extension();
            $request->photo->move('public_path', $imagePath);
            if (File::exists(public_path('public_path/' . $thecake->photo))) {

                unlink(public_path('public_path/' . $thecake->photo));
            }
            $thecake->photo = $imagePath;
        }
        $thecake->save();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cake)
    {
        if (!Gate::allows('destroy.cake')) {
            abort(403);
        }

        $cake->delete();
        return redirect()->route('home');
    }

    public function addCake()
    {
        if (!Gate::allows('add.get')) {
            abort(403);
        }
        return view('cake.create');
    }

    public function updateCake($cake)
    {
        if (!Gate::allows('update.cake.view')) {
            abort(403);
        }
        return view('cake.update')->with(['cake' => $cake]);
    }
}
