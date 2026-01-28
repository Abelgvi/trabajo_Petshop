<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // <--- IMPORTANTE: Nueva importación necesaria
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // 1. Desactivamos la protección de claves foráneas temporalmente
        Schema::disableForeignKeyConstraints();

        // 2. Ahora sí podemos limpiar la tabla sin que MySQL se queje
        DB::table('productos')->truncate();

        // 3. Volvemos a activar la protección inmediatamente
        Schema::enableForeignKeyConstraints();

        $now = Carbon::now();

        $productos = [
            // --- PERROS ---
            [
                'nombre' => 'Pienso Premium Adulto 15kg',
                'descripcion' => 'Alimento completo y equilibrado para perros adultos de todas las razas.',
                'precio' => 45.99,
                'stock' => 50,
                'imagen' => 'img/perroFondoBlanco.jpg',
                'categoria' => 'Alimentación',
                'animal_objetivo' => 'perro',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'nombre' => 'Correa Extensible 5m',
                'descripcion' => 'Libertad de movimiento con total seguridad. Freno resistente.',
                'precio' => 12.50,
                'stock' => 20,
                'imagen' => 'img/perroFondoBlanco.jpg',
                'categoria' => 'Accesorios',
                'animal_objetivo' => 'perro',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'nombre' => 'Champú Pelo Blanco',
                'descripcion' => 'Realza el color natural y deja un aroma fresco.',
                'precio' => 8.95,
                'stock' => 30,
                'imagen' => 'img/perroLavado.jpg',
                'categoria' => 'Higiene',
                'animal_objetivo' => 'perro',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- GATOS ---
            [
                'nombre' => 'Rascador Torre 3 Niveles',
                'descripcion' => 'El paraíso de la diversión para tu felino. Incluye juguetes colgantes.',
                'precio' => 35.00,
                'stock' => 15,
                'imagen' => 'img/gatoFondoBlanco.jpg',
                'categoria' => 'Accesorios',
                'animal_objetivo' => 'gato',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'nombre' => 'Latas Gourmet Salmón',
                'descripcion' => 'Pack de 12 latas de comida húmeda con trozos reales de pescado.',
                'precio' => 18.20,
                'stock' => 100,
                'imagen' => 'img/gatoFondoBlanco.jpg',
                'categoria' => 'Alimentación',
                'animal_objetivo' => 'gato',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- AVES ---
            [
                'nombre' => 'Mixtura para Loros',
                'descripcion' => 'Semillas seleccionadas y enriquecidas con vitaminas.',
                'precio' => 9.50,
                'stock' => 40,
                'imagen' => 'img/loroFondoBlanco.jpg',
                'categoria' => 'Alimentación',
                'animal_objetivo' => 'ave',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'nombre' => 'Jaula Grande con Soporte',
                'descripcion' => 'Espaciosa y fácil de limpiar. Ideal para ninfas y loros.',
                'precio' => 89.99,
                'stock' => 5,
                'imagen' => 'img/loroFondoBlanco.jpg',
                'categoria' => 'Accesorios',
                'animal_objetivo' => 'ave',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- ROEDORES ---
            [
                'nombre' => 'Heno de Montaña con Manzanilla',
                'descripcion' => 'Esencial para la digestión de conejos y cobayas.',
                'precio' => 5.50,
                'stock' => 60,
                'imagen' => 'img/conejoFondoBlanco.jpg',
                'categoria' => 'Alimentación',
                'animal_objetivo' => 'roedor',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- PECES ---
            [
                'nombre' => 'Comida en Escamas Goldfish',
                'descripcion' => 'Nutrición completa para peces de agua fría.',
                'precio' => 4.20,
                'stock' => 50,
                'imagen' => 'img/pezFondoBlanco.jpg',
                'categoria' => 'Alimentación',
                'animal_objetivo' => 'peces',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- REPTILES ---
            [
                'nombre' => 'Terrario Cristal 60x45x45',
                'descripcion' => 'Ventilación frontal y puertas abatibles.',
                'precio' => 120.00,
                'stock' => 3,
                'imagen' => 'img/camaleonFondoBlanco.webp',
                'categoria' => 'Accesorios',
                'animal_objetivo' => 'reptiles',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'nombre' => 'Calcio + Vitamina D3',
                'descripcion' => 'Suplemento esencial para huesos fuertes.',
                'precio' => 11.50,
                'stock' => 25,
                'imagen' => 'img/camaleonFondoBlanco.webp',
                'categoria' => 'Farmacia',
                'animal_objetivo' => 'reptiles',
                'created_at' => $now, 'updated_at' => $now,
            ],
            
            // --- OFERTAS ---
            [
                'nombre' => 'Pelota de Goma',
                'descripcion' => 'Juguete resistente para morder.',
                'precio' => 3.50,
                'stock' => 200,
                'imagen' => 'img/perroFondoBlanco.jpg',
                'categoria' => 'Accesorios',
                'animal_objetivo' => 'perro',
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];

        DB::table('productos')->insert($productos);
    }
}