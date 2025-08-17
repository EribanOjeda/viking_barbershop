<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reserva;

class BuscadorController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $clientes = collect();
        $reservas = collect();

        if ($q !== '') {
            $clientes = Cliente::query()
                ->where('nombre', 'like', "%{$q}%")
                ->orWhere('email', 'like', "%{$q}%")
                ->orWhere('telefono', 'like', "%{$q}%")
                ->orderBy('nombre')
                ->limit(25)
                ->get();

            $reservas = Reserva::with('cliente')
                ->where('servicio', 'like', "%{$q}%")
                ->orWhereHas('cliente', function($qq) use ($q){
                    $qq->where('nombre','like',"%{$q}%");
                })
                ->orderBy('fecha','desc')
                ->limit(25)
                ->get();
        }

        return view('buscar.index', compact('q','clientes','reservas'));
    }
}
