<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    public $fillable = [
        'nama_album', 
        'deskripsi',
        'tgl_dibuat', 
        'user_id', 
    ]; 

    public function scopeLatest(Builder $query)
    {
        $query->orderBy('id', 'DESC'); 
    }

    public function scopeSelf(Builder $query)
    {
        $query->where('user_id', Auth::user()->id); 
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class); 
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
