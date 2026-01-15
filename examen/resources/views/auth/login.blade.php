<x-guest-layout>
    <!-- Logo/Header -->
    <div class="auth-logo">
        <h1>{{ config('app.name', 'Laravel') }}</h1>
        <p>Inicia sesión en tu cuenta</p>
    </div>
    
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif
    
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
    
    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
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
                autofocus 
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
                autocomplete="current-password"
                placeholder="••••••••"
            >
        </div>
        
        <!-- Remember Me -->
        <div class="mb-4">
            <div class="form-check">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="form-check-input" 
                    name="remember"
                >
                <label for="remember_me" class="form-check-label">
                    Recuérdame
                </label>
            </div>
        </div>
        
        <!-- Submit Button -->
        <div class="d-grid mb-4">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Iniciar Sesión
            </button>
        </div>
        
        <!-- Links -->
        <div class="text-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link d-block mb-2">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
            
            @if (Route::has('register'))
                <div class="auth-divider">
                    <span>¿No tienes cuenta?</span>
                </div>
                <a href="{{ route('register') }}" class="auth-link">
                    Crear una cuenta nueva
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>
