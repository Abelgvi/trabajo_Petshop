        <div class="products-grid" id="products-container">
            @foreach($productos as $producto)
            <article class="product-card">
                @if($producto->imagen)
                <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="product-image-placeholder" style="object-fit: cover; width: 100%; height: 150px;">
                @else
                <div class="product-image-placeholder"></div>
                @endif

                <h3>{{ $producto->nombre }}</h3>
                <span class="tag">{{ $producto->categoria }}</span>
                <p>{{ number_format($producto->precio, 2) }} €</p>

                <button class="btn-primary btn-add-cart" data-id="{{ $producto->id }}">
                    <i class="fa-solid fa-cart-plus"></i> Añadir
                </button>
            </article>
            @endforeach
        </div>

        <div style="margin-top: 2rem;">
            {{ $productos->links() }}
        </div>