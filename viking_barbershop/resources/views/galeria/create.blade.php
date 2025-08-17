@extends('layouts.app')
@section('content')
<h1 class="h4 mb-3">Subir foto a la galería</h1>
<form class="row g-3 col-md-8" method="POST" action="{{ route('galeria.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="col-12">
    <label class="form-label">Título</label>
    <input class="form-control" name="titulo" required>
  </div>
  <div class="col-12">
    <label class="form-label">Imagen</label>
    <input type="file" class="form-control" name="imagen" required>
  </div>
  <div class="col-12">
    <label class="form-label">Descripción</label>
    <textarea class="form-control" rows="4" name="descripcion"></textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary">Subir</button>
    <a href="{{ route('galeria.index') }}" class="btn btn-outline-secondary">Volver</a>
  </div>
</form>
@endsection
