@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Mis reservas</h1>
@if($reservas->isEmpty())
  <div class="alert alert-info">Aún no tienes reservas.</div>
@else
<div class="table-responsive">
<table class="table table-hover align-middle">
  <thead>
    <tr><th>Fecha</th><th>Hora</th><th>Servicio</th><th>Estado</th></tr>
  </thead>
  <tbody>
    @foreach($reservas as $r)
    <tr>
      <td>{{ \Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }}</td>
      <td>{{ $r->hora }}</td>
      <td>{{ $r->servicio }}</td>
      <td><span class="badge text-bg-secondary">{{ $r->estado }}</span></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
{{ $reservas->links() }}
@endif
@endsection
