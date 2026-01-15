@extends('layouts.public')

@section('content')
<div class="container py-5">
  <!-- Hero Section -->
  <div class="card border-0 overflow-hidden mb-5" style="background: linear-gradient(145deg, var(--bg-secondary), var(--bg-primary)); position: relative;">
    <div class="position-absolute top-0 end-0 p-5 opacity-10 d-none d-lg-block">
        <i class="bi bi-hexagon-fill" style="font-size: 300px; color: var(--accent-primary);"></i>
    </div>
    
    <div class="row align-items-center position-relative z-1">
      <div class="col-lg-7 p-5">
        <span class="badge badge-primary mb-3">v2.0 Beta</span>
        <h1 class="display-3 fw-bold mb-3" style="letter-spacing: -2px;">
          Domina tu <span style="background: linear-gradient(90deg, var(--accent-primary), var(--accent-info)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Inventario</span>
        </h1>
        <p class="lead text-secondary mb-4 fs-4" style="max-width: 600px;">
          Una plataforma integral diseñada para simplificar la gestión de productos, optimizar categorías y empoderar a tu equipo con datos en tiempo real.
        </p>
        <div class="d-flex gap-3 mt-5">
          @guest
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
              Empieza Gratis <i class="bi bi-arrow-right ms-2"></i>
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-5">
              Acceder
            </a>
          @else
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg px-5 shadow-lg">
              Panel de Control <i class="bi bi-speedometer2 ms-2"></i>
            </a>
          @endguest
        </div>
      </div>
      <div class="col-lg-5 p-5 d-none d-lg-block">
        <div class="card bg-dark border-dark p-4 shadow-xl" style="transform: perspective(1000px) rotateY(-15deg) rotateX(5deg);">
            <div class="d-flex align-items-center mb-4">
                <div class="stat-card-icon primary me-3 mb-0">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div>
                    <h6 class="mb-0">Crecimiento Mensual</h6>
                    <small class="text-success">+24% incremento</small>
                </div>
            </div>
            <div class="bg-primary opacity-10 rounded-3 w-100 mb-2" style="height: 120px;"></div>
            <div class="d-flex justify-content-between mt-3 text-secondary small">
                <span>Ene</span>
                <span>Feb</span>
                <span>Mar</span>
                <span>Abr</span>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="row g-4 mb-5">
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="stat-card-icon primary mb-4">
            <i class="bi bi-box-seam"></i>
          </div>
          <h4 class="fw-bold mb-3">Gestión Inteligente</h4>
          <p class="text-secondary">
            Nuestro motor de IA optimiza el stock automáticamente, sugiriendo reposiciones basadas en tendencias de venta.
          </p>
          <ul class="list-unstyled text-secondary mt-3">
            <li><i class="bi bi-check2 text-primary me-2"></i> SKU ilimitados</li>
            <li><i class="bi bi-check2 text-primary me-2"></i> Tracking en tiempo real</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="stat-card-icon success mb-4">
            <i class="bi bi-tags"></i>
          </div>
          <h4 class="fw-bold mb-3">Taxonomía Avanzada</h4>
          <p class="text-secondary">
            Navega por jerarquías complejas con facilidad. Atributos dinámicos y meta-datos personalizados por categoría.
          </p>
          <ul class="list-unstyled text-secondary mt-3">
            <li><i class="bi bi-check2 text-success me-2"></i> Filtros inteligentes</li>
            <li><i class="bi bi-check2 text-success me-2"></i> Atributos SEO</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card h-100 border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="stat-card-icon warning mb-4">
            <i class="bi bi-shield-lock"></i>
          </div>
          <h4 class="fw-bold mb-3">Seguridad Enterprise</h4>
          <p class="text-secondary">
            Arquitectura robusta con control de acceso por roles (RBAC) y auditoría completa de cada cambio en el sistema.
          </p>
          <ul class="list-unstyled text-secondary mt-3">
            <li><i class="bi bi-check2 text-warning me-2"></i> Auth 2.0 integrado</li>
            <li><i class="bi bi-check2 text-warning me-2"></i> Logs de auditoría</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Summary Section for Auth Users -->
  @auth
  <div class="row mb-5 align-items-stretch">
    <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header border-0 bg-transparent py-4 px-4">
                <h5 class="fw-bold mb-0">Métricas de Rendimiento</h5>
            </div>
            <div class="card-body px-4 pb-4">
                <div class="row g-4 text-center">
                    <div class="col-md-3">
                        <div class="p-3 bg-dark rounded-4 shadow-sm border-dark h-100 d-flex flex-column justify-content-center">
                            <span class="text-muted small text-uppercase fw-bold mb-2">Productos</span>
                            <h2 class="fw-bold text-primary mb-0">{{ \App\Models\Product::count() }}</h2>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-dark rounded-4 shadow-sm border-dark h-100 d-flex flex-column justify-content-center">
                            <span class="text-muted small text-uppercase fw-bold mb-2">Categorías</span>
                            <h2 class="fw-bold text-success mb-0">{{ \App\Models\Category::count() }}</h2>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-dark rounded-4 shadow-sm border-dark h-100 d-flex flex-column justify-content-center">
                            <span class="text-muted small text-uppercase fw-bold mb-2">Usuarios</span>
                            <h2 class="fw-bold text-warning mb-0">{{ \App\Models\User::count() }}</h2>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-dark rounded-4 shadow-sm border-dark h-100 d-flex flex-column justify-content-center">
                            <span class="text-muted small text-uppercase fw-bold mb-2">Valor Total</span>
                            <h2 class="fw-bold text-info mb-0">${{ number_format(\App\Models\Product::sum('precio')/1000, 1) }}k</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-5 p-4 bg-dark rounded-4 border-dark">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">KPI Semanal</h6>
                        <span class="badge badge-success">+5.7%</span>
                    </div>
                    <div class="progress bg-secondary" style="height: 10px;">
                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, var(--accent-primary), var(--accent-primary-hover)); color: white;">
            <div class="card-body p-4 d-flex flex-column justify-content-center h-100">
                <h4 class="fw-bold mb-4">¿Todo listo para hoy?</h4>
                <p class="opacity-75 mb-4 fs-5">Tienes 3 tareas pendientes de revisión en tu dashboard. Mantén tu flujo de trabajo optimizado.</p>
                <a href="{{ route('dashboard') }}" class="btn btn-white btn-lg mt-auto text-primary">
                    Ir al Panel <i class="bi bi-chevron-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
  </div>
  @endauth

  <!-- Final CTA for Guests -->
  @guest
  <div class="card border-0 shadow-xl overflow-hidden mt-5" style="background: var(--bg-secondary);">
    <div class="card-body p-5 text-center">
      <div class="row justify-content-center px-4">
        <div class="col-lg-8">
            <h2 class="display-5 fw-bold mb-4">Lleva tu gestión al siguiente nivel</h2>
            <p class="text-secondary fs-5 mb-5">
                Únete a más de 500 empresas que ya están optimizando sus procesos con nuestra plataforma.
            </p>
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mt-3">
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5 py-3 shadow-lg">
                    Registrarse Ahora
                </a>
                <a href="mailto:ventas@ejemplo.com" class="btn btn-outline-primary btn-lg px-5 py-3">
                    Contactar Ventas
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>
  @endguest
</div>
@endsection