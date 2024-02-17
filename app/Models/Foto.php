<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    public $fillable = [
        'judul_foto', 
        'album_id', 
        'deskripsi_foto', 
        'tgl_unggah', 
        'image', 
        'user_id', 
    ]; 

    public function scopeSelf(Builder $query)
    {
        $query->where('user_id', Auth::user()->id); 
    }

    public function scopeLatest(Builder $query)
    {
        $query->orderBy('id', 'DESC'); 
    }

    public function album()
    {
        return $this->belongsTo(Album::class); 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); 
    }

    public function likes()
    {
        return $this->hasMany(Like::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}   
