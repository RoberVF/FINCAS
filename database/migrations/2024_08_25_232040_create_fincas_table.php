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
        Schema::create('fincas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre');
            $table->integer('dimensiones');
            $table->integer('num_parras');
            $table->string('terreno');
            $table->string('ubicacion');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fincas');
    }
};
