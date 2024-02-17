<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto_id', 'isi_komentar', 'nama',
    ];

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id');
    }

}
