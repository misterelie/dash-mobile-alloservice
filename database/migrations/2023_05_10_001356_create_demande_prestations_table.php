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
        Schema::create('demande_prestations', function (Blueprint $table) {
            $table->id();
            $table->string('prestation_demande');
            $table->string('mode_travail');
            $table->integer('salaire_propose')->nullable()->default(NULL);
            $table->integer('age');
            $table->string('ethnie');
            $table->date('date');
            $table->text('observation')->nullable();
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_prestations');
    }
};
