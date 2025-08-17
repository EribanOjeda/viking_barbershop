@php($title = $title ?? 'Viking Barbershop')
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">Viking Barbershop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('galeria.index') }}">Galería</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a></li>
      </ul>
      <form class="d-flex ms-2 mt-2 mt-lg-0" role="search" action="{{ route('buscar') }}" method="get">
        <input class="form-control me-2" type="search" name="q" value="{{ request('q') }}" placeholder="Buscar clientes, reservas..." aria-label="Buscar">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>
      @auth
        <div class="ms-3 d-flex align-items-center gap-2">
          <span class="text-light small">Hola, {{ auth()->user()->name }}</span>
          <a href="{{ route('cuenta.reservas') }}" class="btn btn-sm btn-outline-light">Mis reservas</a>
          @if(auth()->user()->role==='admin')
            <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-warning">Admin</a>
          @endif
          <form class="d-inline" method="POST" action="{{ route('auth.logout') }}">@csrf<button class="btn btn-sm btn-danger">Salir</button></form>
        </div>
      @else
        <div class="ms-3">
          <a class="btn btn-sm btn-outline-light" href="{{ route('auth.login.show') }}">Entrar</a>
          <a class="btn btn-sm btn-primary" href="{{ route('auth.register.show') }}">Registrarme</a>
        </div>
      @endauth
    </div>
  </div>
</nav>

<main class="container">
  @if(session('ok'))
    <div class="alert alert-success">{{ session('ok') }}</div>
  @endif
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @yield('content')
</main>
<div id="app" class="container my-4">
  <!-- Ejemplo Vue: -->
  <reservas-widget></reservas-widget>
</div>


<footer class="text-center py-4 mt-5 border-top">
  <small>© {{ date('Y') }} Viking Barbershop</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/js/app.js'])
@endif
</body>
</html>
