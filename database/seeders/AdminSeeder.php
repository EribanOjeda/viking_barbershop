<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cliente;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@viking.local'],
            ['name' => 'Admin', 'password' => Hash::make('admin123'), 'role' => 'admin']
        );

        // Vincular cliente demo a un usuario cliente
        $clienteUser = User::firstOrCreate(
            ['email' => 'juan@example.com'],
            ['name' => 'Juan Pérez', 'password' => Hash::make('password'), 'role' => 'cliente']
        );

        $cliente = Cliente::where('email','juan@example.com')->first();
        if ($cliente && !$cliente->user_id) {
            $cliente->user_id = $clienteUser->id;
            $cliente->save();
        }
    }
}
