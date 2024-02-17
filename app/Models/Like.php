<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['id','foto_id'];

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id', 'id');
    }

    public $timestamps = false;

}
