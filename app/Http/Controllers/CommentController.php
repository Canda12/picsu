<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(Foto $foto, CommentRequest $request)
    {
        $request = $request->validated(); 

        $request['user_id'] = Auth::user()->id; 

        $foto->comments()->create($request); 

        return redirect()->back(); 
    }

    public function delete(Comment $comment)
    {
        $comment->delete(); 

        return redirect()->back(); 
    }
}
