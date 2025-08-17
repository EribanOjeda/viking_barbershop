@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4">Clientes</h1>
  <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo cliente</a>
</div>

<div class="table-responsive">
<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Teléfono</th>
      <th class="text-end">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clientes as $c)
    <tr>
      <td>{{ $c->id }}</td>
      <td>{{ $c->nombre }}</td>
      <td>{{ $c->email }}</td>
      <td>{{ $c->telefono }}</td>
      <td class="text-end">
        <a href="{{ route('reservas.create') }}?cliente_id={{ $c->id }}" class="btn btn-sm btn-outline-secondary">Reservar</a>
        <a href="{{ route('clientes.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>
        <form class="d-inline" action="{{ route('clientes.destroy', $c) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

{{ $clientes->links() }}
@endsection
