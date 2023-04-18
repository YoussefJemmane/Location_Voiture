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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('color_id')->constrained('colors')->onDelete('cascade');
            $table->foreignId('modele_id')->constrained('models')->onDelete('cascade');
            $table->foreignId('marque_id')->constrained('marques')->onDelete('cascade');

            $table->string('prixJour');
            $table->integer('disponible')->default(1);

            $table->string('photo')->default('home/732242.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
