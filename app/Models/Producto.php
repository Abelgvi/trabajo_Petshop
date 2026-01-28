<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table= 'productos';

    protected $fillable =[
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'imagen',
        'categoria',       // Recuerda: es un ENUM en la BD
        'animal_objetivo', // Recuerda: es un ENUM en la BD
    ];
}
