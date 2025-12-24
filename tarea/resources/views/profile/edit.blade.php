@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Mi Perfil</h2>
            <p class="text-secondary mb-0">Administra tu información personal y configuración de cuenta</p>
        </div>
    </div>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            Perfil actualizado correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('status') === 'password-updated')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            Contraseña actualizada correctamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Profile Information Card -->
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-person-circle me-2"></i>
                        Información del Perfil
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="form-label">
                                <i class="bi bi-person me-1"></i>
                                Nombre Completo
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', $user->name) }}" 
                                required 
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1"></i>
                                Correo Electrónico
                            </label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $user->email) }}" 
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="alert alert-warning mt-2">
                                    <small>
                                        Tu correo electrónico no está verificado.
                                        <a href="{{ route('verification.send') }}" class="alert-link">
                                            Haz clic aquí para reenviar el correo de verificación.
                                        </a>
                                    </small>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-shield-lock me-2"></i>
                        Actualizar Contraseña
                    </h5>
                </div>
                <div class="card-body">
                    <p class="text-secondary mb-4">
                        Asegúrate de usar una contraseña larga y segura para mantener tu cuenta protegida.
                    </p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">
                                <i class="bi bi-lock me-1"></i>
                                Contraseña Actual
                            </label>
                            <input 
                                type="password" 
                                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                                id="current_password" 
                                name="current_password" 
                                autocomplete="current-password"
                            >
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-key me-1"></i>
                                Nueva Contraseña
                            </label>
                            <input 
                                type="password" 
                                class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                autocomplete="new-password"
                            >
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Mínimo 8 caracteres</small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi bi-key-fill me-1"></i>
                                Confirmar Nueva Contraseña
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                autocomplete="new-password"
                            >
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-shield-check me-2"></i>
                                Actualizar Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar with User Info -->
        <div class="col-12 col-lg-4">
            <!-- User Card -->
            <div class="card">
                <div class="card-body text-center">
                    <div class="stat-card-icon primary mx-auto mb-3" style="width: 80px; height: 80px; font-size: 2.5rem;">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h4 style="color: var(--text-primary);">{{ $user->name }}</h4>
                    <p class="text-secondary mb-3">{{ $user->email }}</p>
                    
                    <div class="d-grid gap-2">
                        @if ($user->email_verified_at)
                            <span class="badge badge-success">
                                <i class="bi bi-check-circle me-1"></i>
                                Email Verificado
                            </span>
                        @else
                            <span class="badge badge-warning">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                Email No Verificado
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Account Info Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0">Información de la Cuenta</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-secondary d-block mb-1">Miembro desde</small>
                        <strong>{{ $user->created_at->format('d/m/Y') }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-secondary d-block mb-1">Última actualización</small>
                        <strong>{{ $user->updated_at->format('d/m/Y H:i') }}</strong>
                    </div>
                    <div>
                        <small class="text-secondary d-block mb-1">ID de Usuario</small>
                        <strong>#{{ $user->id }}</strong>
                    </div>
                </div>
            </div>

            <!-- Danger Zone Card -->
            <div class="card mt-4" style="border-color: var(--accent-danger);">
                <div class="card-header" style="background: rgba(239, 68, 68, 0.1); border-bottom-color: var(--accent-danger);">
                    <h6 class="mb-0" style="color: var(--accent-danger);">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Zona de Peligro
                    </h6>
                </div>
                <div class="card-body">
                    <p class="text-secondary mb-3" style="font-size: 0.875rem;">
                        Una vez que elimines tu cuenta, todos sus recursos y datos serán eliminados permanentemente.
                    </p>
                    
                    <button 
                        type="button" 
                        class="btn btn-danger w-100" 
                        data-bs-toggle="modal" 
                        data-bs-target="#deleteAccountModal"
                    >
                        <i class="bi bi-trash me-2"></i>
                        Eliminar Cuenta
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="modal-header" style="border-bottom-color: var(--border-color);">
                <h5 class="modal-title" id="deleteAccountModalLabel" style="color: var(--accent-danger);">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Confirmar Eliminación de Cuenta
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
            </div>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')
                
                <div class="modal-body">
                    <p style="color: var(--text-primary);">
                        ¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.
                    </p>
                    <p class="text-secondary mb-3">
                        Por favor, ingresa tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.
                    </p>
                    
                    <div class="mb-3">
                        <label for="delete_password" class="form-label">Contraseña</label>
                        <input 
                            type="password" 
                            class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                            id="delete_password" 
                            name="password" 
                            placeholder="Ingresa tu contraseña"
                        >
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="modal-footer" style="border-top-color: var(--border-color);">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-2"></i>
                        Eliminar Cuenta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
