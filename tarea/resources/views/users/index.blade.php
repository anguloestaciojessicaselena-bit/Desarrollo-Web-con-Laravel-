@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Usuarios</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Creado</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at->format('Y-m-d') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
