<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de tener el modelo Producto creado

class HomeController extends Controller
{
    public function __invoke()
    {
        // 1. DESTACADOS: Cogemos 4 productos aleatorios para que la web cambie cada vez que entras
        $destacados = Producto::inRandomOrder()->take(4)->get();

        // 2. OFERTAS: Cogemos los 4 productos más baratos
        $ofertas = Producto::orderBy('precio', 'asc')->take(4)->get();

        // 3. MÁS VENDIDOS: Por ahora, simulamos cogiendo los 4 últimos añadidos (novedades)
        // (Cuando tengas ventas reales, podrás cambiar esto para contar pedidos)
        $masVendidos = Producto::latest()->take(4)->get();

        // Enviamos las tres listas a la vista 'welcome'
        return view('welcome', compact('destacados', 'ofertas', 'masVendidos'));
    }
}