@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Registro</h1>
<form method="POST" action="{{ route('auth.register') }}" class="row g-3 col-md-6">
  @csrf
  <div class="col-12">
    <label class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
  </div>
  <div class="col-12">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
  </div>
  <div class="col-12">
    <label class="form-label">Teléfono</label>
    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Confirmar contraseña</label>
    <input type="password" name="password_confirmation" class="form-control" required>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Crear cuenta</button>
    <a class="btn btn-link" href="{{ route('auth.login.show') }}">¿Ya tienes cuenta? Inicia sesión</a>
  </div>
</form>
@endsection
