@extends('layouts.app')

@section('title', 'Tienda')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/animales.css') }}">
@endpush

@section('content')
<div class="shop-container">

    <aside class="filters">
        <h3>Filtros</h3>

        <div class="filter-group">
            <h4>Animal</h4>
            <ul>
                <li><label><input type="checkbox" name="animal[]" value="perro"> Perro</label></li>
                <li><label><input type="checkbox" name="animal[]" value="gato"> Gato</label></li>
                <li><label><input type="checkbox" name="animal[]" value="ave"> Ave</label></li>
                <li><label><input type="checkbox" name="animal[]" value="roedor"> Roedor</label></li>
                <li><label><input type="checkbox" name="animal[]" value="peces"> Peces</label></li>
                <li><label><input type="checkbox" name="animal[]" value="reptiles"> Reptiles</label></li>
            </ul>
        </div>

        <div class="filter-group">
            <h4>Categoría</h4>
            <ul>
                <li><label><input type="checkbox" name="categoria[]" value="Alimentación"> Alimentación</label></li>
                <li><label><input type="checkbox" name="categoria[]" value="Higiene"> Higiene</label></li>
                <li><label><input type="checkbox" name="categoria[]" value="Accesorios"> Accesorios</label></li>
                <li><label><input type="checkbox" name="categoria[]" value="Farmacia"> Farmacia</label></li>
            </ul>
        </div>
    </aside>

    <section class="products-section">
        <h1>Nuestros Productos</h1>

        <div id="products-container">
            @include('tienda.partials.list')
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleccionamos todos los checkboxes
        const filters = document.querySelectorAll('.filters input[type="checkbox"]');

        // Escuchamos cuando alguien marca o desmarca
        filters.forEach(filter => {
            filter.addEventListener('change', function() {
                fetchProducts();
            });
        });

        function fetchProducts() {
            // Recoger qué checkboxes están marcados
            const selectedAnimals = Array.from(document.querySelectorAll('input[name="animal[]"]:checked')).map(el => el.value);
            const selectedCategories = Array.from(document.querySelectorAll('input[name="categoria[]"]:checked')).map(el => el.value);

            // Crear la URL con los parámetros (ej: /tienda?animal[]=perro)
            const params = new URLSearchParams();
            selectedAnimals.forEach(val => params.append('animal[]', val));
            selectedCategories.forEach(val => params.append('categoria[]', val));
            
            const url = `${window.location.pathname}?${params.toString()}`;

            // Petición AJAX al servidor
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                // Reemplazamos el contenido del contenedor
                document.getElementById('products-container').innerHTML = html;
                // Cambiamos la URL del navegador sin recargar
                window.history.pushState({}, '', url);
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>
@endpush