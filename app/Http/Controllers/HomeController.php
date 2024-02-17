<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fotos = Foto::latest()->get(); 

        return view('index', compact('fotos')); 
    }
}
