<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'img', 'contenido', 'destacada', 'descripcion_img'];

    public function writer(){
        return $this->belongsTo(Writer::class);
    }
}
