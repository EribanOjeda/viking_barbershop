@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Nuevo Post</h1>
<form method="POST" action="{{ route('admin.posts.store') }}" class="row g-3" enctype="multipart/form-data">
  @csrf
  <div class="col-md-8">
    <label class="form-label">Título</label>
    <input class="form-control" name="titulo" required>
  </div>
  <div class="col-md-4 form-check mt-4">
    <input type="checkbox" class="form-check-input" id="publicar" name="publicar" value="1">
    <label class="form-check-label" for="publicar">Publicar ahora</label>
  </div>
  <div class="col-12">
    <label class="form-label">Imagen</label>
    <input type="file" name="imagen" class="form-control">
  </div>
  <div class="col-12">
    <label class="form-label">Contenido (HTML permitido)</label>
    <textarea class="form-control" rows="8" name="contenido"></textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Guardar</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</form>
@endsection
