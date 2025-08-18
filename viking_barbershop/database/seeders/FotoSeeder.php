<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Foto;

class FotoSeeder extends Seeder
{
    public function run(): void
    {
        // ⚠️ En desarrollo está bien; en producción evita truncate() si ya hay datos reales
        Foto::truncate();

        Foto::insert([
            [
                'titulo' => 'Corte clásico',
                // Imagen de corte clásico (barber/haircut) 600x400
                'imagen_url' => 'https://source.unsplash.com/600x400/?barber,haircut&sig=1',
                'descripcion' => 'Estilo clásico con degradado suave.'
            ],
            [
                'titulo' => 'Fade moderno',
                // Imagen de fade moderno 600x400
                'imagen_url' => 'https://source.unsplash.com/600x400/?fade,haircut,barbershop&sig=2',
                'descripcion' => 'Fade medio con texturizado.'
            ],
            [
                'titulo' => 'Barba perfilada',
                // Imagen de barbería enfocada en barba 600x400
                'imagen_url' => 'https://source.unsplash.com/600x400/?barber,beard,trim&sig=3',
                'descripcion' => 'Perfilado y contorno con navaja.'
            ],
        ]);
    }
}
