@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Panel de Inventario</h2>
        <p class="text-secondary small">Monitorea los niveles de stock y productos críticos</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Producto
        </a>
    </div>
</div>

<!-- Stats Row -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-card-icon primary">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="stat-card-value">{{ $products->count() }}</div>
            <div class="stat-card-label">Total Productos</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-card-icon success">
                <i class="bi bi-stack"></i>
            </div>
            <div class="stat-card-value">{{ $totalStock }}</div>
            <div class="stat-card-label">Unidades Totales</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="stat-card-icon danger">
                <i class="bi bi-exclamation-triangle"></i>
            </div>
            <div class="stat-card-value">{{ $lowStockCount }}</div>
            <div class="stat-card-label">Stock Bajo (< 10)</div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-transparent border-0 pt-4 px-4">
        <h5 class="mb-0">Estado Detallado del Inventario</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Producto</th>
                        <th>Categoría</th>
                        <th>Nivel de Stock</th>
                        <th>Progreso</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold">{{ $product->nombre }}</div>
                            <div class="text-muted small">${{ number_format($product->precio, 2) }}</div>
                        </td>
                        <td>
                            <span class="badge badge-primary">{{ $product->category->nombre ?? 'N/A' }}</span>
                        </td>
                        <td>
                            <span class="fw-bold {{ $product->stock < 10 ? 'text-danger' : 'text-success' }}">
                                {{ $product->stock }} Unidades
                            </span>
                        </td>
                        <td style="width: 200px;">
                            @php
                                $percent = min(($product->stock / 20) * 100, 100);
                                $color = $product->stock < 10 ? 'bg-danger' : ($product->stock < 50 ? 'bg-warning' : 'bg-success');
                            @endphp
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar {{ $color }}" role="progressbar" style="width: {{ $percent }}%" aria-valuenow="{{ $percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>
                        <td class="text-end pe-4">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">No hay datos de inventario.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
