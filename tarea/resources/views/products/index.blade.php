@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Productos</h2>
  <a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Nuevo</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="table-responsive">
    <table id="products-table" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Categoría</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $p)
        <tr>
          <td>{{ $p->nombre }}</td>
          <td>${{ $p->precio }}</td>
          <td>{{ $p->stock }}</td>
          <td>{{ $p->category->nombre ?? 'Sin categoría' }}</td>
          <td>
            <a href="{{ route('products.edit', $p) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('products.destroy',$p) }}" method="POST" class="d-inline">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@push('scripts')
<script>
$(function(){
  $('#products-table').DataTable({
    responsive: true,
    pageLength: 10,
    columnDefs: [ { orderable: false, targets: -1 } ],
    language: {
      url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
    }
  });
});
</script>
@endpush
</div>
@endsection
