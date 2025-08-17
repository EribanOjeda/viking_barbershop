<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Post;

Route::get('/clientes', fn() => Cliente::latest()->take(50)->get());
Route::get('/reservas', fn() => Reserva::with('cliente')->latest()->take(50)->get());
Route::get('/posts', fn() => Post::whereNotNull('published_at')->latest('published_at')->take(20)->get());

// Ejemplo crear reserva vía API (simple demo, sin auth):
Route::post('/reservas', function(Request $r){
    $data = $r->validate([
        'cliente_id' => ['required','exists:clientes,id'],
        'fecha' => ['required','date'],
        'hora' => ['required'],
        'servicio' => ['required','string','max:100'],
    ]);
    return \App\Models\Reserva::create($data);
});
