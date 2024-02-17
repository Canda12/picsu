<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Album;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\FotoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::self()->latest()->get(); 

        return view('modules.foto.index', compact('fotos')); 
    }

    public function show(Foto $foto)
    {
        return view('modules.foto.show', compact('foto')); 
    }

    public function like(Foto $foto) 
    {
        $userId = Auth::user()->id; 
        $isLikeExists = $foto->likes()
            ->where('user_id', $userId)
            ->first(); 

        if ($isLikeExists) {
            $isLikeExists->delete(); 
        } else {
            $foto->likes()->create([
                'user_id' => Auth::user()->id, 
            ]);
        }

        return redirect()->back();
    }

    public function create()
    {
        $formAction = route('foto.store'); 
        $albums = Album::self()->get(); 

        return view('modules.foto.form', compact('formAction', 'albums')); 
    }

    public function edit(Foto $foto)
    {
        $formAction = route('foto.update', ['foto' => $foto]); 
        $albums = Album::self()->get(); 

        return view('modules.foto.form', compact('formAction', 'albums', 'foto')); 
    }

    public function store(FotoRequest $request)
    {
        $fileName = sprintf('/photos/%s.jpg', Str::uuid()->toString()); 
        Storage::put($fileName, file_get_contents($request->image));  

        $validated = $request->validated(); 
        $validated['image'] = $fileName; 
        $validated['user_id'] = Auth::user()->id; 

        Foto::create($validated); 

        return redirect()->route('foto.index'); 
    }

    public function update(Foto $foto, FotoRequest $request)
    {
        $validated = $request->validated(); 

        if ($request->hasFile('image')) {
            $fileName = sprintf('/photos/%s.jpg', Str::uuid()->toString()); 
            Storage::put($fileName, file_get_contents($request->image));  
            $validated['image'] = $fileName; 
        }

        $validated['user_id'] = Auth::user()->id; 

        $foto->update($validated); 

        return redirect()->route('foto.index'); 
    }

    public function delete(Foto $foto)
    {
        $foto->delete(); 

        return redirect()->route('foto.index'); 
    }
}
