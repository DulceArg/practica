<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cupon', function (Blueprint $table) {
            $table->id('cupon_id');
            $table->string('codigo', 50);
            $table->date('fecha_inicio');
            $table->date('fecha_expiracion');
            $table->integer('stock')->default(0);
            $table->string('estatus', 50)->default('activo');
            $table->string('imagen')->nullable(); 

            // Solo queda la relación con tipo_cupon
            $table->unsignedBigInteger('tipo_cupon_id');
            $table->foreign('tipo_cupon_id')->references('tipo_cupon_id')->on('tipo_cupon')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('cupon');
    }
};
