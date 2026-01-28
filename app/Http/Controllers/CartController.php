<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    // AÑADIR (AJAX)
    public function add($id)
    {
        $producto = Producto::find($id);
        if(!$producto) return response()->json(['error' => 'No encontrado'], 404);

        $cart = session()->get('cart', []);

        // Si existe, sumamos cantidad. Si no, lo creamos con 1.
        if(isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true, 
            'message' => 'Producto añadido correctamente',
            'total_items' => array_sum($cart)
        ]);
    }

    // VER CARRITO
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // Si está vacío, vista vacía
        if(empty($cart)) {
            return view('carrito.index', ['productos' => [], 'total' => 0]);
        }

        // Recuperamos los datos reales de la BD
        $productos = Producto::whereIn('id', array_keys($cart))->get();
        
        $total = 0;
        foreach($productos as $p) {
            $p->cantidad = $cart[$p->id];
            $p->subtotal = $p->precio * $p->cantidad;
            $total += $p->subtotal;
        }

        return view('carrito.index', compact('productos', 'total'));
    }

    // ELIMINAR UNO
    public function remove($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

    // VACIAR TODO
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back();
    }
}