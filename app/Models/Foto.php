<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'fotos';
    
    public $fillable = [
        'judul_foto', 
        'album_id', 
        'deskripsi_foto', 
        'tgl_unggah', 
        'image', 
    ]; 

    public function album()
    {
        return $this->belongsTo(Album::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}   
