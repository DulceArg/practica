<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contador_cupones', function (Blueprint $table) {
            $table->id('contador_id');
            $table->integer('total_cupones')->default(0);
            $table->date('fecha_actualizacion');

            // Relaciones principales
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tipo_cupon_id');

            // Nueva relación: cupón exacto canjeado (opcional, puede ser null si se elimina el cupón)
            $table->unsignedBigInteger('cupon_id')->nullable();

            // Llaves foráneas
            $table->foreign('usuario_id')->references('usuario_id')->on('usuario')->onDelete('cascade');
            $table->foreign('tipo_cupon_id')->references('tipo_cupon_id')->on('tipo_cupon')->onDelete('cascade');
            $table->foreign('cupon_id')->references('cupon_id')->on('cupon')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contador_cupones');
    }
};
