<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    public $fillable = [
        'judul_foto', 
        'album_id', 
        'deskripsi_foto', 
        'tgl_unggah', 
        'image', 
    ]; 
}   
