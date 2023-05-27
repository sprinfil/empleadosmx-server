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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('telefono')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->unsignedInteger('num_aplicantes')->nullable();
            $table->timestamps();

            $table->index('nombre');

            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
