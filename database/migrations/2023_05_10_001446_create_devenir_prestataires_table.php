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
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('civilite')->nullable();
            $table->date('date_naissance');
            $table->string('situation_matrimoniale')->nullable();
            $table->string('nombre_enfant');
            $table->string('telephone1', 50);
            $table->string('telephone2', 50)->nullable();
            $table->string('whatsapp', 50)->nullable();
            $table->string('email', 191);
            $table->foreignId('ethnie_id', 191)->nullable();
            $table->foreignId('commune_id')->nullable();
            $table->string('quartier')->nullable();
            $table->string('photo');
            $table->string('activite')->nullable();
            $table->string('annee_experience')->nullable();
            $table->float('pretention_salairiale');
            $table->string('zone_intervention')->nullable();
            $table->string('personne_contact');
            $table->string('reference');
            $table->string('reference_contact');
            $table->string('alphabetisation')->nullable();
            $table->string('dernier_diplome')->nullable();
            $table->string('mode_travail')->nullable();
            $table->string('disponibilite')->nullable();
            $table->string('nature_piece')->nullable();
            $table->string('numero_piece', 191);
            $table->string('rencontre_allo_service')->nullable();
            $table->date('date_appel');
            $table->string('copie_piece');
            $table->string('copie_dernier_diplome')->nullable();
            $table->string('catalogue_realisation');
            $table->text('observation')->nullable();
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
