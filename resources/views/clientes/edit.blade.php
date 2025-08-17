@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Editar cliente</h1>
<form method="POST" action="{{ route('clientes.update', $cliente) }}" class="row g-3">
  @csrf @method('PUT')
  <div class="col-md-6">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control" required value="{{ old('nombre', $cliente->nombre) }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required value="{{ old('email', $cliente->email) }}">
  </div>
  <div class="col-md=6">
    <label class="form-label">Teléfono</label>
    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}">
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</form>
@endsection
