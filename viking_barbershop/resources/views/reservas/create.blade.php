@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Nueva reserva</h1>
<form method="POST" action="{{ route('reservas.store') }}" class="row g-3">
  @csrf
  <div class="col-md-6">
    <label class="form-label">Cliente</label>
    <select name="cliente_id" class="form-select" required>
      <option value="">Seleccionar...</option>
      @foreach ($clientes as $c)
        <option value="{{ $c->id }}" @selected(request('cliente_id')==$c->id)>{{ $c->nombre }} ({{ $c->email }})</option>
      @endforeach
    </select>
  </div>
  <div class="col-md-3">
    <label class="form-label">Fecha</label>
    <input type="date" name="fecha" class="form-control" required>
  </div>
  <div class="col-md-3">
    <label class="form-label">Hora</label>
    <input type="time" name="hora" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Servicio</label>
    <input type="text" name="servicio" class="form-control" required placeholder="Corte, barba, etc.">
  </div>
  <div class="col-md-6">
    <label class="form-label">Estado</label>
    <select name="estado" class="form-select">
      <option value="pendiente" selected>pendiente</option>
      <option value="confirmada">confirmada</option>
      <option value="cancelada">cancelada</option>
    </select>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('reservas.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</form>
@endsection
