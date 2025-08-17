<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Reserva;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::truncate();
        Reserva::truncate();

        $cliente = Cliente::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'telefono' => '70000000',
        ]);

        Reserva::create([
            'cliente_id' => $cliente->id,
            'fecha' => now()->addDay()->toDateString(),
            'hora' => '10:30:00',
            'servicio' => 'Corte + Barba',
            'estado' => 'pendiente',
        ]);
    }
}
