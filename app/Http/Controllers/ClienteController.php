<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'desc')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:120'],
            'email'  => ['required','email','max:150','unique:clientes,email'],
            'telefono' => ['nullable','string','max:30'],
        ]);
        Cliente::create($data);
        return redirect()->route('clientes.index')->with('ok','Cliente creado');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:120'],
            'email'  => ['required','email','max:150', Rule::unique('clientes','email')->ignore($cliente->id)],
            'telefono' => ['nullable','string','max:30'],
        ]);
        $cliente->update($data);
        return redirect()->route('clientes.index')->with('ok','Cliente actualizado');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('ok','Cliente eliminado');
    }
}
