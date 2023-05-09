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
        Schema::create('curriculus', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->text('informacionAdicional')->nullable();

            $table->foreignId('candidato_id')->constrained();
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
        Schema::dropIfExists('curriculums');
    }
};
