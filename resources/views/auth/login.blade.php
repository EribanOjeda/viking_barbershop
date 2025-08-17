@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Iniciar sesión</h1>
<form method="POST" action="{{ route('auth.login') }}" class="row g-3 col-md-6">
  @csrf
  <div class="col-12">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
  </div>
  <div class="col-12">
    <label class="form-label">Contraseña</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <div class="col-12 form-check">
    <input type="checkbox" name="remember" class="form-check-input" id="remember">
    <label class="form-check-label" for="remember">Recordarme</label>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Entrar</button>
    <a class="btn btn-link" href="{{ route('auth.register.show') }}">¿No tienes cuenta? Regístrate</a>
  </div>
</form>
@endsection
