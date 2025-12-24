@extends('layouts.public')

@section('content')
<div class="container py-5">
  <!-- Hero Section -->
  <div class="hero mb-5" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1)); border: 1px solid var(--border-color);">
    <div class="hero-content">
      <h1 style="color: var(--text-primary);">Bienvenido a {{ config('app.name', 'Laravel') }}</h1>
      <p class="lead" style="color: var(--text-secondary);">
        Sistema moderno de gestión de productos, categorías y usuarios con un diseño elegante y funcional.
      </p>
      <div class="hero-cta">
        @guest
          <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-2">
            <i class="bi bi-person-plus me-2"></i>
            Crear cuenta
          </a>
          <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg">
            <i class="bi bi-box-arrow-in-right me-2"></i>
            Iniciar sesión
          </a>
        @else
          <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-speedometer2 me-2"></i>
            Ir al Dashboard
          </a>
        @endguest
      </div>
    </div>
    <div class="hero-image">
      <div style="width: 240px; height: 240px; background: linear-gradient(135deg, var(--accent-primary), var(--accent-success)); border-radius: 20px; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-xl);">
        <i class="bi bi-grid-3x3-gap" style="font-size: 80px; color: white;"></i>
      </div>
    </div>
  </div>

  <!-- Features Grid -->
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="card h-100 text-center">
        <div class="card-body">
          <div class="stat-card-icon primary mx-auto mb-3">
            <i class="bi bi-box-seam"></i>
          </div>
          <h5 style="color: var(--text-primary);">Gestión de Productos</h5>
          <p style="color: var(--text-secondary);">
            Administra tu inventario de productos con facilidad. Crea, edita y organiza tus productos de manera eficiente.
          </p>
          @auth
            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary mt-2">
              Ver Productos <i class="bi bi-arrow-right ms-1"></i>
            </a>
          @endauth
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 text-center">
        <div class="card-body">
          <div class="stat-card-icon success mx-auto mb-3">
            <i class="bi bi-tags"></i>
          </div>
          <h5 style="color: var(--text-primary);">Categorías Organizadas</h5>
          <p style="color: var(--text-secondary);">
            Organiza tus productos en categorías claras y estructuradas para una mejor gestión y búsqueda.
          </p>
          @auth
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-primary mt-2">
              Ver Categorías <i class="bi bi-arrow-right ms-1"></i>
            </a>
          @endauth
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 text-center">
        <div class="card-body">
          <div class="stat-card-icon warning mx-auto mb-3">
            <i class="bi bi-people"></i>
          </div>
          <h5 style="color: var(--text-primary);">Control de Usuarios</h5>
          <p style="color: var(--text-secondary);">
            Administra los usuarios del sistema con un panel intuitivo y seguro. Control total sobre permisos y accesos.
          </p>
          @auth
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-primary mt-2">
              Ver Usuarios <i class="bi bi-arrow-right ms-1"></i>
            </a>
          @endauth
        </div>
      </div>
    </div>
  </div>

  <!-- Stats Section (if authenticated) -->
  @auth
  <div class="card mb-5">
    <div class="card-header">
      <h4 class="mb-0">Resumen Rápido</h4>
    </div>
    <div class="card-body">
      <div class="row g-4">
        <div class="col-6 col-md-3 text-center">
          <div class="stat-card-value">{{ \App\Models\Product::count() }}</div>
          <div class="stat-card-label">Productos</div>
        </div>
        <div class="col-6 col-md-3 text-center">
          <div class="stat-card-value">{{ \App\Models\Category::count() }}</div>
          <div class="stat-card-label">Categorías</div>
        </div>
        <div class="col-6 col-md-3 text-center">
          <div class="stat-card-value">{{ \App\Models\User::count() }}</div>
          <div class="stat-card-label">Usuarios</div>
        </div>
        <div class="col-6 col-md-3 text-center">
          <div class="stat-card-value">${{ number_format(\App\Models\Product::sum('price'), 0) }}</div>
          <div class="stat-card-label">Valor Total</div>
        </div>
      </div>
    </div>
  </div>
  @endauth

  <!-- CTA Section -->
  @guest
  <div class="card text-center">
    <div class="card-body py-5">
      <h3 style="color: var(--text-primary);" class="mb-3">¿Listo para comenzar?</h3>
      <p style="color: var(--text-secondary);" class="mb-4">
        Únete ahora y empieza a gestionar tu negocio de manera profesional
      </p>
      <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-rocket-takeoff me-2"></i>
        Comenzar Ahora
      </a>
    </div>
  </div>
  @endguest
</div>
@endsection