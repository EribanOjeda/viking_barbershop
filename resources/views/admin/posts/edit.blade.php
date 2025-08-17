@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Editar Post</h1>
<form method="POST" action="{{ route('admin.posts.update', $post) }}" class="row g-3" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="col-md-8">
    <label class="form-label">Título</label>
    <input class="form-control" name="titulo" required value="{{ old('titulo',$post->titulo) }}">
  </div>
  <div class="col-md-4 form-check mt-4">
    <input type="checkbox" class="form-check-input" id="publicar" name="publicar" value="1" @checked($post->published_at)>
    <label class="form-check-label" for="publicar">Publicado</label>
  </div>
  <div class="col-12">
    <label class="form-label">Imagen</label>
    <input type="file" name="imagen" class="form-control">
    @if($post->imagen_path)
      <img class="img-fluid mt-2 rounded" style="max-height:120px" src="{{ asset('storage/'.$post->imagen_path) }}">
    @endif
  </div>
  <div class="col-12">
    <label class="form-label">Contenido</label>
    <textarea class="form-control" rows="8" name="contenido">{{ old('contenido',$post->contenido) }}</textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</form>
@endsection
