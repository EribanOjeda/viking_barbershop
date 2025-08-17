@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Blog</h1>
<div class="row g-3">
  @forelse($posts as $p)
  <div class="col-md-4">
    <div class="card h-100">
      @if($p->imagen_path)
        <img class="card-img-top" src="{{ asset('storage/'.$p->imagen_path) }}" alt="{{ $p->titulo }}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $p->titulo }}</h5>
        <p class="card-text text-muted">{{ Str::limit(strip_tags($p->contenido), 120) }}</p>
        <a href="{{ route('blog.show', $p->slug) }}" class="btn btn-sm btn-outline-primary">Leer</a>
      </div>
    </div>
  </div>
  @empty
    <p class="text-muted">No hay publicaciones.</p>
  @endforelse
</div>
<div class="mt-3">{{ $posts->links() }}</div>
@endsection
