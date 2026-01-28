<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPoint - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"> 
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    @stack('styles')
</head>

<body>

    <header>
        <a href="{{ url('/') }}" class="logo">PetPoint</a>

        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/tienda') }}">tienda</a></li>
                <li><a href="{{ url('/peluqueria') }}">Peluquería</a></li>
                <li><a href="{{ url('/talleres') }}">Talleres</a></li>
            </ul>
        </nav>

        

        <div class="nav-icons">
            <div class="nav-icons">
    

  
   

</div>
        </div>
    </header>
    
    

     <main>

        @yield('content')
    </main>
   

    <footer class="footer">
        <div class="footer-container">

            <div class="footer-column">
                <h3>Sobre PetPoint</h3>
                <ul>
                    <li><a href="{{ url('/sobre') }}">Quiénes somos</a></li>
                    <li><a href="#">Nuestras tiendas</a></li>
                    <li><a href="#">Club PetPoint</a></li>
                    <li><a href="#">Sello Confianza Online</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Enlaces de interés</h3>
                <ul>
                    <li><a href="#">Compra recurrente</a></li>
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#">Métodos de pago</a></li>
                    <li><a href="#">Devoluciones y reembolsos</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Contacto</h3>
                <ul>
                    <li><a href="#">¡Contacta con nosotros!</a></li>
                    <li><a href="#">Seguimiento de pedidos</a></li>
                    <li><a href="{{ url('/carrito') }}">Carrito</a></li>
                    <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Información Legal</h3>
                <ul>
                    <li><a href="#">Política de Privacidad y Cookies</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">Medicamentos Veterinarios</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-legal">
            <p>© 2025 PetPoint</p>
            <p>PetPoint S.L. — CIF: B12345678</p>
            <p>Nº autorización comercial detallista: 24-356-CDMV</p>
        </div>
    </footer>
@stack('scripts')
</body>

</html>