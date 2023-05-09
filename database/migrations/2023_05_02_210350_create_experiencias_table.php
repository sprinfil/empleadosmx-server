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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('puesto')->nullable();
            $table->string('empresa')->nullable();
            $table->string('ciudad')->nullable();

            $table->foreignId('curriculu_id')->constrained();
            $table->timestamps();

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
        Schema::dropIfExists('experiencias');
    }
};
