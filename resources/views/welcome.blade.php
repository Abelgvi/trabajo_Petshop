@extends('layouts.app')

@section('title', 'Inicio')

@section('content')



<section class="categories-section">

    <div class="category-item">
        <a href="{{ url('/tienda?animal[]=perro') }}" class="category-circle">
            <img src="{{ asset('img/perroFondoBlanco.jpg') }}" alt="Ver productos para Perros">
        </a>
        <p class="category-text">Perros</p>
    </div>

    <div class="category-item">
        <a href="{{ url('/tienda?animal[]=gato') }}" class="category-circle">
            <img src="{{ asset('img/gatoFondoBlanco.jpg') }}" alt="Ver productos para Gatos">
        </a>
        <p class="category-text">   Gatos</p>
    </div>

    <div class="category-item">
        <a href="{{ url('/tienda?animal[]=ave') }}" class="category-circle">
            <img src="{{ asset('img/loroFondoBlanco.jpg') }}" alt="Ver productos para Aves">
        </a>
        <p class="category-text">   Aves</p>
    </div>

    <div class="category-item">
        <a href="{{ url('/tienda?animal[]=roedor') }}" class="category-circle">
            <img src="{{ asset('img/conejoFondoBlanco.jpg') }}" alt="Ver productos para Roedores">
        </a>
        <p class="category-text">   Roedores</p>
    </div>

    <div class="category-item">
        <a href="{{ url('/tienda?animal[]=peces') }}" class="category-circle">
            <img src="{{ asset('img/pezFondoBlanco.jpg') }}" alt="Ver productos para Peces">
        </a>
        <p class="category-text">   Peces</p>
    </div>

    <div class="category-item">
        <a href="{{ url('/tienda?animal[]=reptiles') }}" class="category-circle">
            <img src="{{ asset('img/camaleonFondoBlanco.webp') }}" alt="Ver productos para Reptiles">
        </a>
        <p class="category-text">   Reptiles</p>
    </div>

</section>

    <section class="featured">
    
<section class="featured">

    <h2>Destacados</h2>
    <div class="product-grid">
        @foreach($destacados as $producto)
            <article class="product-card">
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image-placeholder" style="object-fit: cover; width: 100%; height: 150px;">
                @else
                    <div class="product-image-placeholder"></div>
                @endif

                <h3>{{ $producto->nombre }}</h3>
                
                <span class="tag">{{ $producto->categoria }}</span>
                
                <p>{{ number_format($producto->precio, 2) }} €</p>
                
                <button class="btn-primary">Añadir</button>
            </article>
        @endforeach
    </div>

    <h2>Ofertas</h2>
    <div class="product-grid">
        @foreach($ofertas as $producto)
            <article class="product-card">
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image-placeholder" style="object-fit: cover; width: 100%; height: 150px;">
                @else
                    <div class="product-image-placeholder"></div>
                @endif

                <h3>{{ $producto->nombre }}</h3>
                <span class="tag">{{ $producto->categoria }}</span>
                
                <p>
                    <span class="old-price" style="text-decoration: line-through; color: #999; font-size: 0.9em;">
                        {{ number_format($producto->precio * 1.20, 2) }} €
                    </span>
                    <strong>{{ number_format($producto->precio, 2) }} €</strong>
                </p>
                
                <button class="btn-primary">Añadir</button>
            </article>
        @endforeach
    </div>

    <h2>Más vendidos</h2>
    <div class="product-grid">
        @foreach($masVendidos as $producto)
            <article class="product-card">
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image-placeholder" style="object-fit: cover; width: 100%; height: 150px;">
                @else
                    <div class="product-image-placeholder"></div>
                @endif
                
                <h3>{{ $producto->nombre }}</h3>
                <span class="tag">{{ $producto->categoria }}</span>
                <p>{{ number_format($producto->precio, 2) }} €</p>
                <button class="btn-primary">Añadir</button>
            </article>
        @endforeach
    </div>
</section>
@endsection