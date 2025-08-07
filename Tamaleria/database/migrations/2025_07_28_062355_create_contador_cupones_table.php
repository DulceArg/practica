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
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tipo_cupon_id');
            $table->unsignedBigInteger('cupon_id');
            $table->unsignedBigInteger('orden_id'); // ✅ Ya está incluido correctamente

            $table->integer('total_cupones')->default(1);
            $table->dateTime('fecha_actualizacion')->default(now());

            // Relaciones
            $table->foreign('usuario_id')->references('usuario_id')->on('usuario')->onDelete('cascade');
            $table->foreign('tipo_cupon_id')->references('tipo_cupon_id')->on('tipo_cupon')->onDelete('cascade');
            $table->foreign('cupon_id')->references('cupon_id')->on('cupon')->onDelete('cascade');
            $table->foreign('orden_id')->references('orden_id')->on('ordenes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contador_cupones');
    }
};
