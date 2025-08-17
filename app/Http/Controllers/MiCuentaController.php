<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;

class MiCuentaController extends Controller
{
    public function misReservas()
    {
        $user = Auth::user();
        $cliente = $user?->cliente; // via relation in Cliente model (inverse)
        $reservas = collect();
        if ($cliente) {
            $reservas = Reserva::with('cliente')->where('cliente_id', $cliente->id)->orderByDesc('fecha')->paginate(10);
        }
        return view('cuenta.mis_reservas', compact('reservas'));
    }
}
