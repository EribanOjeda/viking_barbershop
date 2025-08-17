<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cliente;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:120'],
            'email' => ['required','email','max:150','unique:users,email'],
            'password' => ['required','confirmed','min:6'],
            'telefono' => ['nullable','string','max:30'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telefono' => $data['telefono'] ?? null,
            'role' => 'cliente',
        ]);

        // Crear cliente vinculado
        $cliente = Cliente::create([
            'user_id' => $user->id,
            'nombre' => $user->name,
            'email' => $user->email,
            'telefono' => $user->telefono,
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('ok','Registro exitoso');
    }
}
