@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Dashboard</h2>
            <p class="text-secondary mb-0">Bienvenido de vuelta, {{ Auth::user()->name }}</p>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-card-icon primary">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="stat-card-value">{{ \App\Models\Product::count() }}</div>
                <div class="stat-card-label">Total Productos</div>
                <div class="stat-card-change positive">
                    <i class="bi bi-arrow-up"></i> +12% este mes
                </div>
            </div>
        </div>
        
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-card-icon success">
                    <i class="bi bi-tags"></i>
                </div>
                <div class="stat-card-value">{{ \App\Models\Category::count() }}</div>
                <div class="stat-card-label">Categorías</div>
                <div class="stat-card-change positive">
                    <i class="bi bi-arrow-up"></i> +3 nuevas
                </div>
            </div>
        </div>
        
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-card-icon warning">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-card-value">{{ \App\Models\User::count() }}</div>
                <div class="stat-card-label">Usuarios</div>
                <div class="stat-card-change positive">
                    <i class="bi bi-arrow-up"></i> +5 esta semana
                </div>
            </div>
        </div>
        
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card">
                <div class="stat-card-icon danger">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="stat-card-value">${{ number_format(\App\Models\Product::sum('precio'), 2) }}</div>
                <div class="stat-card-label">Valor Inventario</div>
                <div class="stat-card-change negative">
                    <i class="bi bi-arrow-down"></i> -2% este mes
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity & Quick Actions -->
    <div class="row g-4">
        <!-- Recent Products -->
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Productos Recientes</h5>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-primary">Ver todos</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(\App\Models\Product::with('category')->latest()->take(5)->get() as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="stat-card-icon primary me-2" style="width: 32px; height: 32px; font-size: 0.875rem;">
                                                <i class="bi bi-box"></i>
                                            </div>
                                            <strong>{{ $product->nombre }}</strong>
                                        </div>
                                    </td>
                                    <td>{{ $product->category->nombre ?? 'Sin categoría' }}</td>
                                    <td>${{ number_format($product->precio, 2) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if($product->estado)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Inactivo</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-secondary">
                                        No hay productos registrados
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Acciones Rápidas</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>
                            Nuevo Producto
                        </a>
                        <a href="{{ route('products.inventory') }}" class="btn btn-primary">
                            <i class="bi bi-clipboard-data me-2"></i>
                            Ver Inventario
                        </a>
                        <a href="{{ route('categories.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle me-2"></i>
                            Nueva Categoría
                        </a>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-list-ul me-2"></i>
                            Ver Productos
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-list-ul me-2"></i>
                            Ver Categorías
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- System Info -->
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Información del Sistema</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-secondary d-block mb-1">Versión Laravel</small>
                        <strong>{{ app()->version() }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-secondary d-block mb-1">Versión PHP</small>
                        <strong>{{ PHP_VERSION }}</strong>
                    </div>
                    <div>
                        <small class="text-secondary d-block mb-1">Última actualización</small>
                        <strong>{{ now()->format('d/m/Y H:i') }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
