<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration {
    public function up(): void {
        Schema::create('rol', function (Blueprint $table) {
            $table->id('rol_id');
            $table->string('nombre_rol', 100)->unique();
            $table->string('descripcion_rol', 255)->nullable();
        });

        DB::table('rol')->insert([
            ['nombre_rol' => 'Administrador', 'descripcion_rol' => 'Rol encargado de la administración y gestión de la tamalería'],
            ['nombre_rol' => 'Usuario', 'descripcion_rol' => 'Rol encargado de la compra de productos de la tamalería'],
        ]);
    }

    public function down(): void {
        Schema::dropIfExists('rol');
    }
};

