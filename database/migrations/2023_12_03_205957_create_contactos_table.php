<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('referencia al usuario')->constrained()->cascadeOnDelete();
            $table->string('nombre_contacto')->comment('nombre del contacto');
            $table->string('apellido_contacto')->comment('apellido del contacto');
            $table->string('telefono_contacto')->comment('telefono del contacto');
            $table->string('slug')->unique()->comment('slug del contacto para identificar en la URI');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
