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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('salario')->nullable();

            $table->foreignId('empresa_id')->constrained();
            $table->timestamps();

            $table->index('titulo');

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
        Schema::dropIfExists('vacantes');
    }
};
