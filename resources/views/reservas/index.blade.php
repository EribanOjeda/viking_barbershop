@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4">Reservas</h1>
  <a href="{{ route('reservas.create') }}" class="btn btn-primary">Nueva reserva</a>
</div>

<div class="table-responsive">
<table class="table table-hover align-middle">
  <thead>
    <tr>
      <th>ID</th>
      <th>Cliente</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Servicio</th>
      <th>Estado</th>
      <th class="text-end">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($reservas as $r)
    <tr>
      <td>{{ $r->id }}</td>
      <td>{{ $r->cliente->nombre }}</td>
      <td>{{ \Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }}</td>
      <td>{{ $r->hora }}</td>
      <td>{{ $r->servicio }}</td>
      <td>
        <form action="{{ route('reservas.estado', $r) }}" method="POST" class="d-inline">
          @csrf @method('PATCH')
          <select name="estado" class="form-select form-select-sm" onchange="this.form.submit()">
            <option value="pendiente" {{ $r->estado=='pendiente'?'selected':'' }}>pendiente</option>
            <option value="confirmada" {{ $r->estado=='confirmada'?'selected':'' }}>confirmada</option>
            <option value="cancelada" {{ $r->estado=='cancelada'?'selected':'' }}>cancelada</option>
          </select>
        </form>
      </td>
      <td class="text-end">
        <form class="d-inline" action="{{ route('reservas.destroy', $r) }}" method="POST" onsubmit="return confirm('¿Eliminar reserva?')">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

{{ $reservas->links() }}
@endsection
