<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    public function index()
    {
        $fotos = Foto::latest()->paginate(9);
        return view('galeria.index', compact('fotos'));
    }

    public function create()
    {
        return view('galeria.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => ['required','string','max:120'],
            'imagen' => ['required','image','max:4096'],
            'descripcion' => ['nullable','string'],
        ]);

        $path = $request->file('imagen')->store('uploads', 'public');

        Foto::create([
            'titulo'      => $data['titulo'],
            'imagen_url'  => 'storage/'.$path, // se mostrará con asset($f->imagen_url)
            'descripcion' => $data['descripcion'] ?? null,
        ]);

        return redirect()->route('galeria.index')->with('ok','Foto subida');
    }

    public function edit(Foto $foto)
    {
        return view('galeria.edit', compact('foto'));
    }

    public function update(Request $request, Foto $foto)
    {
        $data = $request->validate([
            'titulo' => ['required','string','max:120'],
            'imagen' => ['nullable','image','max:4096'],
            'descripcion' => ['nullable','string'],
        ]);

        if ($request->hasFile('imagen')) {
            // Borra la anterior si era local
            if ($foto->imagen_url && str_starts_with($foto->imagen_url, 'storage/')) {
                $old = str_replace('storage/', '', $foto->imagen_url);
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('imagen')->store('uploads','public');
            $foto->imagen_url = 'storage/'.$path;
        }

        $foto->titulo = $data['titulo'];
        $foto->descripcion = $data['descripcion'] ?? null;
        $foto->save();

        return redirect()->route('galeria.index')->with('ok','Foto actualizada');
    }

    public function destroy(Foto $foto)
    {
        if ($foto->imagen_url && str_starts_with($foto->imagen_url, 'storage/')) {
            $old = str_replace('storage/', '', $foto->imagen_url);
            Storage::disk('public')->delete($old);
        }
        $foto->delete();

        return back()->with('ok','Foto eliminada');
    }
}
