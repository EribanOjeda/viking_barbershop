<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Reserva;

class HomeController extends Controller
{
    public function index()
    {
        $fotos = Foto::latest()->take(6)->get();
        $reservas = Reserva::with('cliente')->latest()->take(5)->get();
        return view('home', compact('fotos', 'reservas'));
    }
}
