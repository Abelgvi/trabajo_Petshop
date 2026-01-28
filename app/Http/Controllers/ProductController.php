<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Producto::query();

    // Filtros...
    if ($request->filled('animal')) {
        $query->whereIn('animal_objetivo', $request->animal);
    }
    if ($request->filled('categoria')) {
        $query->whereIn('categoria', $request->categoria);
    }

    $productos = $query->paginate(12);

    // CAMBIO CLAVE: Comprobamos si es ajax() O si tiene la cabecera explícita
    if ($request->ajax() || $request->header('X-Requested-With') == 'XMLHttpRequest') {
        return view('tienda.partials.list', compact('productos'))->render();
    }

    return view('tienda.index', compact('productos'));
}
}