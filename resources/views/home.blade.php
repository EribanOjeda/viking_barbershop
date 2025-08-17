@extends('layouts.app')
@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <div class="p-4 bg-light rounded-3">
      <h1 class="h3 mb-3">Bienvenido a Viking Barbershop</h1>
      <p class="mb-0">Sistema básico con Bootstrap: clientes, reservas y galería de trabajos.</p>
    </div>

    <h2 class="h5 mt-4">Galería reciente</h2>
    <div class="row g-3">
      @forelse($fotos as $foto)
      <div class="col-md-4">
        <div class="card h-100">
          <img src="{{ $foto->imagen_url }}" class="card-img-top" alt="{{ $foto->titulo }}">
          <div class="card-body">
            <h5 class="card-title">{{ $foto->titulo }}</h5>
            <p class="card-text text-muted">{{ Str::limit($foto->descripcion, 80) }}</p>
          </div>
        </div>
      </div>
      @empty
      <p class="text-muted">Sin fotos por ahora.</p>
      @endforelse
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card">
      <div class="card-header">Reservas recientes</div>
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
          <li class="list-group-item text-muted">Sin reservas.</li>
        @endforelse
      </ul>
    </div>
  </div>
</div>
@endsection


@php($posts = \App\Models\Post::whereNotNull('published_at')->latest('published_at')->take(3)->get())
<h2 class="h5 mt-4">Últimos artículos del blog</h2>
<div class="row g-3">
  @forelse($posts as $p)
  <div class="col-md-4">
    <div class="card h-100">
      @if($p->imagen_path)
        <img class="card-img-top" src="{{ asset('storage/'.$p->imagen_path) }}" alt="{{ $p->titulo }}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $p->titulo }}</h5>
        <a href="{{ route('blog.show',$p->slug) }}" class="btn btn-sm btn-outline-primary">Leer</a>
      </div>
    </div>
  </div>
  @empty
  <p class="text-muted">Aún no hay publicaciones.</p>
  @endforelse
</div>
