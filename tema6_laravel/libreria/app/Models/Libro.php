<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'anio_publicacion',
        'genero',
        'portada_url',
    ];
}
