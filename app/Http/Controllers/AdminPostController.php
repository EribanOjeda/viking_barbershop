<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['required','string','max:160'],
            'contenido' => ['nullable','string'],
            'imagen' => ['nullable','image','max:4096'],
            'publicar' => ['nullable','boolean'],
        ]);
        $slug = Str::slug($data['titulo']).'-'.Str::random(6);
        $path = null;
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('uploads', 'public');
        }
        $post = Post::create([
            'titulo' => $data['titulo'],
            'slug' => $slug,
            'contenido' => $data['contenido'] ?? null,
            'imagen_path' => $path,
            'published_at' => $request->boolean('publicar') ? now() : null,
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('admin.posts.index')->with('ok','Post creado');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'titulo' => ['required','string','max:160'],
            'contenido' => ['nullable','string'],
            'imagen' => ['nullable','image','max:4096'],
            'publicar' => ['nullable','boolean'],
        ]);
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('uploads', 'public');
            $post->imagen_path = $path;
        }
        $post->titulo = $data['titulo'];
        $post->contenido = $data['contenido'] ?? null;
        $post->published_at = $request->boolean('publicar') ? now() : null;
        $post->save();
        return redirect()->route('admin.posts.index')->with('ok','Post actualizado');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('ok','Post eliminado');
    }
}
