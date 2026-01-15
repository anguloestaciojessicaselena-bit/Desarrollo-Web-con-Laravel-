<x-guest-layout>
    <!-- Logo/Header -->
    <div class="auth-logo">
        <h1>{{ config('app.name', 'Laravel') }}</h1>
        <p>Crea tu cuenta para comenzar</p>
    </div>
    
    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Register Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">
                <i class="bi bi-person me-1"></i>
                Nombre Completo
            </label>
            <input 
                id="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Juan Pérez"
            >
        </div>
        
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">
                <i class="bi bi-envelope me-1"></i>
                Correo Electrónico
            </label>
            <input 
                id="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autocomplete="username"
                placeholder="tu@email.com"
            >
        </div>
        
        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">
                <i class="bi bi-lock me-1"></i>
                Contraseña
            </label>
            <input 
                id="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                name="password" 
                required 
                autocomplete="new-password"
                placeholder="Mínimo 8 caracteres"
            >
            <small class="text-muted">Debe tener al menos 8 caracteres</small>
        </div>
        
        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label">
                <i class="bi bi-lock-fill me-1"></i>
                Confirmar Contraseña
            </label>
            <input 
                id="password_confirmation" 
                type="password" 
                class="form-control" 
                name="password_confirmation" 
                required 
                autocomplete="new-password"
                placeholder="Repite tu contraseña"
            >
        </div>
        
        <!-- Submit Button -->
        <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus me-2"></i>
                Crear Cuenta
            </button>
        </div>
        
        <!-- Links -->
        <div class="text-center">
            <div class="auth-divider">
                <span>¿Ya tienes cuenta?</span>
            </div>
            <a href="{{ route('login') }}" class="auth-link">
                Iniciar sesión aquí
            </a>
        </div>
    </form>
</x-guest-layout>
