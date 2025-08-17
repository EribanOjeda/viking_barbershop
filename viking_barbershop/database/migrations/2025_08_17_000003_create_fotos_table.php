<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 120);
            $table->string('imagen_url'); // Para demo: usar URL pública
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('fotos');
    }
};
