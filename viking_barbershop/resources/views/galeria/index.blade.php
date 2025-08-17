@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Galería de trabajos</h1>
<div class="row g-3">
  @forelse($fotos as $f)
  <div class="col-md-4">
    <div class="card h-100">
      <img src="{{ $f->imagen_url }}" class="card-img-top" alt="{{ $f->titulo }}">
      <div class="card-body">
        <h5 class="card-title">{{ $f->titulo }}</h5>
        <p class="card-text text-muted">{{ Str::limit($f->descripcion, 100) }}</p>
      </div>
    </div>
  </div>
  @empty
  <p class="text-muted">Aún no hay fotos.</p>
  @endforelse
</div>

<div class="mt-3">
  {{ $fotos->links() }}
</div>
@endsection
