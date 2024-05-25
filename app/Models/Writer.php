<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'last_name', 
        'email', 
        'location', 
        'profession', 
        'location', 
        'studies', 
        'description'
    ];

    public function news(){
        return $this->hasMany(News::class);
    }
}
