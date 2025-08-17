@extends('layouts.app')
@section('content')
<article class="mx-auto" style="max-width: 820px;">
  <h1 class="mb-3">{{ $post->titulo }}</h1>
  @if($post->imagen_path)
    <img class="img-fluid rounded mb-3" src="{{ asset('storage/'.$post->imagen_path) }}" alt="{{ $post->titulo }}">
  @endif
  <div class="text-muted mb-3">
    Publicado el {{ optional($post->published_at)->format('d/m/Y H:i') }}
  </div>
  <div class="content">{!! $post->contenido !!}</div>
</article>
@endsection
