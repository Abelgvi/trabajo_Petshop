<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Importante para encriptar la contraseña

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Pablo Admin',
            'email' => 'admin@petpoint.com',
            'password' => Hash::make('1234'), // La contraseña será "1234"
            'telefono' => '600123456',
            'direccion' => 'Calle Falsa 123',
            'rol' => 'admin',
            'tipo_mascota' => 'perro',
            'nombre_mascota' => 'Toby',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}