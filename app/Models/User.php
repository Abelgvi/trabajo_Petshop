<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. IMPORTANTE: Conectamos con tu tabla personalizada
    protected $table = 'usuarios';

    // 2. Definimos qué campos se pueden rellenar al registrarse
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'telefono',
        'direccion',
        'rol',             // 'admin' o 'cliente'
        'tipo_mascota',    // 'perro', 'gato', etc.
        'nombre_mascota',
    ];

    // 3. Ocultamos la contraseña para que nunca se muestre por error
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Esto encripta la contraseña automáticamente
    ];
}