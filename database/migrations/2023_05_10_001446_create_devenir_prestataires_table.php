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
        Schema::create('devenir_prestataires', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('civilite')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('situation_matri')->nullable();
            $table->string('nombre_enfant')->nullable();
            $table->string('telephone1', 50)->nullable();
            $table->string('telephone2', 50)->nullable();
            $table->string('whatsapp', 50)->nullable();
            $table->string('email', 191)->nullable();
            $table->foreignId('ethnie_id', 191)->nullable();
            $table->foreignId('commune_id')->nullable();
            $table->foreignId('quartier_id')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('domaine_id')->nullable()->default(NULL);
            $table->string('annee_experience')->nullable();
            $table->float('pretention_salairiale')->nullable();
            $table->string('zone_intervention')->nullable();
            $table->string('personne_contact')->nullable();
            $table->string('reference')->nullable();
            $table->string('reference_contact')->nullable();
            $table->string('alphabet_id')->nullable();
            $table->integer('diplome_id')->nullable();
            $table->integer('mode_id')->nullable();
            $table->integer('dispo_id')->nullable();
            $table->integer('piece_id')->nullable();
            $table->string('numero_piece')->nullable();
            $table->string('canal_id')->nullable();
            $table->date('date_appel')->nullable();
            $table->string('copie_piece')->nullable();
            $table->string('copie_dernier_diplome')->nullable();
            $table->string('catalogue_realisation')->nullable();
            $table->text('avis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devenir_prestataires');
    }
};
