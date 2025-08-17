@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h1 class="h4">Admin — Posts</h1>
  <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Nuevo post</a>
</div>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th><th>Título</th><th>Publicado</th><th class="text-end">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->titulo }}</td>
        <td>{{ $post->published_at ? 'Sí' : 'No' }}</td>
        <td class="text-end">
          <a class="btn btn-sm btn-warning" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
          <form class="d-inline" method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('¿Eliminar?')">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
{{ $posts->links() }}
@endsection
