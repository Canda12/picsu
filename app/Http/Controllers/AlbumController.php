<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->self()->get(); 

        return view('modules.album.index', compact('albums')); 
    }

    public function create()
    {
        $formAction = route('album.store'); 

        return view('modules.album.form', compact('formAction')); 
    }

    public function store(AlbumRequest $request)
    {
        $validated = $request->validated(); 

        $validated['user_id'] = Auth::user()->id; 

        Album::create($validated); 

        return redirect()->route('album.index'); 
    }

    public function edit(Album $album)
    {
        $formAction = route('album.update', ['album' => $album]); 

        return view('modules.album.form', compact('album', 'formAction')); 
    }

    public function update(Album $album, AlbumRequest $request)
    {
        $validated = $request->validated(); 

        $validated['user_id'] = Auth::user()->id; 

        $album->update($validated); 

        return redirect()->route('album.index'); 
    }

    public function delete(Album $album)
    {
        $album->delete(); 

        return redirect()->route('album.index'); 
    }
}
