<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('download');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('images.index',[
            'images'=>Image::all(),
            'categories'=>Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $image = new Image();
        Storage::put('public/img/',$request->file('src'));
        $image->src = $request->file('src')->hashName();
        $image->category_id = $request->category_id;
        $image->save();

        $templates = Image::all();
        if($image->id === 8){
            for ($i=1; $i < 8 ; $i++) { 
                $toDel = Image::find($templates[$i-1]->id);
                $toDel->delete();
                // Storage::delete('public/img/image'.$i.'.jpg');
            };
        };

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $image->category_id = $request->category_id;
        $image->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Storage::delete('public/img/'.$image->src);
        $image->delete();

        return redirect('/images');

    }

    public function download (Image $image)
    {
        return Storage::download('public/img/'.$image->src);
    }
}
