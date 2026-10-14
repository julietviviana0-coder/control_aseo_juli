<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('registro_aseos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->cascadeOnDelete();
            $table->date('fecha');
            $table->string('area', 20);
            $table->string('estado')->default('pendiente');
            $table->timestamps();
            $table->unique(['estudiante_id', 'fecha', 'area']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('registro_aseos');
    }
};