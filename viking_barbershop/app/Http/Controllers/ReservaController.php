<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('cliente')->orderBy('fecha','desc')->paginate(10);
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        return view('reservas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cliente_id' => ['required','exists:clientes,id'],
            'fecha' => ['required','date'],
            'hora' => ['required'],
            'servicio' => ['required','string','max:100'],
            'estado' => ['nullable','in:pendiente,confirmada,cancelada'],
        ]);
        Reserva::create($data);
        return redirect()->route('reservas.index')->with('ok','Reserva registrada');
    }

    public function updateEstado(Request $request, Reserva $reserva)
    {
        $request->validate(['estado' => ['required','in:pendiente,confirmada,cancelada']]);
        $reserva->estado = $request->estado;
        $reserva->save();
        return back()->with('ok','Estado actualizado');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('ok','Reserva eliminada');
    }
}
