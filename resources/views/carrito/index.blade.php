@extends('layouts.app')

@section('title', 'Mi Carrito')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
@endpush

@section('content')
<div class="container" style="padding: 40px; max-width: 1000px; margin: 0 auto;">
    <h1>Tu Carrito de Compra</h1>

    @if(count($productos) > 0)
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="border-bottom: 2px solid #ddd; text-align: left;">
                    <th style="padding: 10px;">Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; display: flex; align-items: center; gap: 15px;">
                        <img src="{{ asset($producto->imagen) }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                        <strong>{{ $producto->nombre }}</strong>
                    </td>
                    <td>{{ number_format($producto->precio, 2) }} €</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ number_format($producto->subtotal, 2) }} €</td>
                    <td>
                        <a href="{{ route('carrito.remove', $producto->id) }}" style="color: red; text-decoration: none;">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align: right; margin-top: 30px;">
            <h3>Total a Pagar: {{ number_format($total, 2) }} €</h3>
            <a href="{{ route('carrito.clear') }}" style="color: #666; margin-right: 20px;">Vaciar Carrito</a>
            <button class="btn-primary">Finalizar Compra</button>
        </div>
    @else
        <div style="text-align: center; padding: 50px;">
            <h3>Tu carrito está vacío 😢</h3>
            <a href="{{ route('tienda.index') }}" class="btn-primary" style="margin-top: 20px; display: inline-block;">Volver a la tienda</a>
        </div>
    @endif
</div>
@endsection