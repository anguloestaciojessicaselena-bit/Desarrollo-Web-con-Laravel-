@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Editar Producto</h3>

      <form action="{{ route('products.update', $product) }}" method="POST" novalidate>
        @csrf @method('PUT')

        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input id="nombre" type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $product->nombre) }}" required>
          @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input id="precio" type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $product->precio) }}" required>
            @error('precio')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="col-md-6 mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input id="stock" type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="category_id" class="form-label">Categoría</label>
          <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">-- Sin categoría --</option>
            @foreach($categories as $c)
              <option value="{{ $c->id }}" @if(old('category_id', $product->category_id)==$c->id) selected @endif>{{ $c->nombre }}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-check form-switch mb-3">
          <input id="estado" class="form-check-input" type="checkbox" name="estado" value="1" @if(old('estado', $product->estado)) checked @endif>
          <label class="form-check-label" for="estado">Activo</label>
        </div>

        <div class="d-flex gap-2">
          <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
          <button class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection