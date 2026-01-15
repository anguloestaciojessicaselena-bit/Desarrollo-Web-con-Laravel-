@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Categorías</h2>
  <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Nueva</a>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="table-responsive">
    <table id="categories-table" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $c)
        <tr>
          <td>{{ $c->nombre }}</td>
          <td>{{ $c->descripcion }}</td>
          <td>
            <a href="{{ route('categories.edit', $c) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('categories.destroy',$c) }}" method="POST" class="d-inline">
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
  $('#categories-table').DataTable({
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
