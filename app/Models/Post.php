<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Para que permite insercion masiva
    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    //Para indicar que hace referencia a la tabla user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
