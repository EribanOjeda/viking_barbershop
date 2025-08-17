<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Foto;

class FotoSeeder extends Seeder
{
    public function run(): void
    {
        Foto::truncate();
        Foto::insert([
            [
                'titulo' => 'Corte clásico',
                'imagen_url' => 'https://picsum.photos/seed/corte1/600/400',
                'descripcion' => 'Estilo clásico con degradado suave.'
            ],
            [
                'titulo' => 'Fade moderno',
                'imagen_url' => 'https://picsum.photos/seed/corte2/600/400',
                'descripcion' => 'Fade medio con texturizado.'
            ],
            [
                'titulo' => 'Barba perfilada',
                'imagen_url' => 'https://picsum.photos/seed/corte3/600/400',
                'descripcion' => 'Perfilado y contorno con navaja.'
            ],
        ]);
    }
}
