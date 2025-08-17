<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('clientes', function (Blueprint $table) {
            if (!Schema::hasColumn('clientes','user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->nullOnDelete();
                $table->unique('user_id');
            }
        });
    }
    public function down(): void {
        Schema::table('clientes', function (Blueprint $table) {
            if (Schema::hasColumn('clientes','user_id')) {
                $table->dropForeign(['user_id']);
                $table->dropUnique(['user_id']);
                $table->dropColumn('user_id');
            }
        });
    }
};
