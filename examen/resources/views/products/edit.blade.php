@extends('layouts.app')

@section('content')
<div class="mb-4">
    <a href="{{ route('products.index') }}" class="text-secondary text-decoration-none small mb-2 d-inline-block">
        <i class="bi bi-arrow-left me-1"></i> Volver a la lista
    </a>
    <h2 class="fw-bold">Editar Producto</h2>
    <p class="text-secondary">Modifica los detalles de <strong>{{ $product->name }}</strong></p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $product->nombre }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Categoría</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock Actual</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio ($)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">$</span>
                                <input type="number" step="0.01" class="form-control border-start-0" id="precio" name="precio" value="{{ $product->precio }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4">{{ $product->descripcion }}</textarea>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="estado" name="estado" value="1" {{ $product->estado ? 'checked' : '' }}>
                            <label class="form-check-label" for="estado">Producto Activo</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2">
                        <a href="{{ route('products.index') }}" class="btn btn-light px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-5">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm overflow-hidden mb-4">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="mb-0">Resumen Rápido</h5>
            </div>
            <div class="card-body p-4 pt-2">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-secondary small">Última actualización:</span>
                    <span class="small fw-bold">{{ $product->updated_at->diffForHumans() }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-secondary small">ID del Sistema:</span>
                    <span class="small fw-bold">#{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm bg-light border-dashed">
            <div class="card-body p-4 text-center">
                <p class="text-secondary small mb-3">¿Deseas eliminar este producto permanentemente?</p>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto? Esta acción no se puede deshacer.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                        <i class="bi bi-trash me-1"></i> Eliminar Registro
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection