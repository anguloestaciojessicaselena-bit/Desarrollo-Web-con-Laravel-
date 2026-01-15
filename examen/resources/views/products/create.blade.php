@extends('layouts.app')

@section('content')
<div class="mb-4">
    <a href="{{ route('products.index') }}" class="text-secondary text-decoration-none small mb-2 d-inline-block">
        <i class="bi bi-arrow-left me-1"></i> Volver a la lista
    </a>
    <h2 class="fw-bold">Nuevo Producto</h2>
    <p class="text-secondary">Completa la información para registrar un nuevo artículo</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="category_id" class="form-label">Categoría</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" selected disabled>Seleccionar Categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock Inicial</label>
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" required>
                        </div>
                        <div class="col-md-6">
                            <label for="precio" class="form-label">Precio ($)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">$</span>
                                <input type="number" step="0.01" class="form-control border-start-0" id="precio" name="precio" placeholder="Precio" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Descripción"></textarea>
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="estado" name="estado" value="1" checked>
                            <label class="form-check-label" for="estado">Producto Activo</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 pt-2">
                        <a href="{{ route('products.index') }}" class="btn btn-light px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-5">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white overflow-hidden">
            <div class="card-body p-4 position-relative">
                <i class="bi bi-star-fill position-absolute end-0 top-0 m-3 opacity-25" style="font-size: 5rem;"></i>
                <h5 class="fw-bold mb-3">Consejos de Inventario</h5>
                <ul class="small ps-3 opacity-90">
                    <li class="mb-2">Asegúrate de que el nombre sea único para evitar confusiones.</li>
                    <li class="mb-2">Mantén un stock mínimo de 5 unidades para productos estrella.</li>
                    <li>Utiliza descripciones detalladas para mejorar la búsqueda interna.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection