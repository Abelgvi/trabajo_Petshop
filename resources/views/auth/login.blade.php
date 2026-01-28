@extends('layouts.loginlayout')

@section('title', 'Iniciar Sesión')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
<section class="login-container">
    <h2>Iniciar Sesión</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@email.com" value="{{ old('email') }}" required autofocus>
            
            @error('email')
                <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="********" required>
        </div>

        <button type="submit" class="btn-primary login-btn">Entrar</button>
    </form>

    <p class="register-text">
        ¿No tienes cuenta?
        <a href="{{ url('/registro') }}" class="register-link">Regístrate aquí</a>
    </p>
</section>
@endsection