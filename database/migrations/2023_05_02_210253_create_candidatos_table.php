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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->date('fechaNac')->nullable();
            $table->string('apellidoM')->nullable();
            $table->string('apellidoP')->nullable();
            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->string('calle')->nullable();
            $table->string('colonia')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->string('especialidad')->nullable();

            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('candidatos');
    }
};
