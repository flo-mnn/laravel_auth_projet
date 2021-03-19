<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('avatars.index',[
            'avatars'=>Avatar::all()
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
        $avatar = new Avatar();
        Storage::put('public/img/',$request->file('src'));
        $avatar->src = $request->file('src')->hashName();
        $avatar->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function show(Avatar $avatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit(Avatar $avatar)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avatar $avatar)
    {
        if ($avatar->id != 1) {
            Storage::delete('public/img/'.$avatar->src);
        }
        Storage::put('public/img/',$request->file('src'));
        $avatar->src = $request->file('src')->hashName();
        $avatar->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avatar $avatar)
    {
        $allUsers = $avatar->users;
        foreach ($allUsers as $item) {
            $toChange = User::find($item->id);
            $toChange->avatar_id = 1;
            $toChange->save();
        }
        $avatar->delete();

        return redirect()->back();
    }

    public function reset() 
    {
        $avatar = Avatar::find(1);
        Storage::delete('public/img/'.$avatar->src);
        $avatar->src = 'avatar.jpg';
        $avatar->save();

        return redirect()->back();
    }
}
