@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Resultados de búsqueda</h1>
@if(($q ?? '')==='')
  <div class="alert alert-info">Escribe algo en el buscador para empezar.</div>
@else
  <p class="text-muted">Buscaste: <strong>{{ $q }}</strong></p>

  <div class="row g-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Clientes</div>
        <ul class="list-group list-group-flush">
          @forelse($clientes as $c)
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                <strong>{{ $c->nombre }}</strong><br>
                <small class="text-muted">{{ $c->email }} @if($c->telefono) — {{ $c->telefono }} @endif</small>
              </div>
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('reservas.create') }}?cliente_id={{ $c->id }}">Reservar</a>
            </li>
          @empty
            <li class="list-group-item text-muted">Sin resultados</li>
          @endforelse
        </ul>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">Reservas</div>
        <ul class="list-group list-group-flush">
          @forelse($reservas as $r)
            <li class="list-group-item">
              <div class="d-flex justify-content-between">
                <div>
                  <strong>{{ $r->cliente->nombre }}</strong><br>
                  <small>{{ $r->servicio }}</small>
                </div>
                <div class="text-end">
                  <span class="badge text-bg-secondary">{{ $r->estado }}</span><br>
                  <small>{{ \Carbon\Carbon::parse($r->fecha)->format('d/m/Y') }} {{ $r->hora }}</small>
                </div>
              </div>
            </li>
          @empty
            <li class="list-group-item text-muted">Sin resultados</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
@endif
@endsection
