<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('id', 'DESC')->get(); 

        return view('modules.album.index', compact('albums')); 
    }

    public function create()
    {
        $formAction = route('album.store'); 

        return view('modules.album.form', compact('formAction')); 
    }

    public function store(AlbumRequest $request)
    {
        Album::create($request->validated()); 

        return redirect()->route('album.index'); 
    }

    public function edit(Album $album)
    {
        $formAction = route('album.update', ['album' => $album]); 

        return view('modules.album.form', compact('album', 'formAction')); 
    }

    public function update(Album $album, AlbumRequest $request)
    {
        $album->update($request->validated()); 

        return redirect()->route('album.index'); 
    }

    public function delete(Album $album)
    {
        $album->delete(); 

        return redirect()->route('album.index'); 
    }
}
