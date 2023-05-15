<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevenirPrestataire extends Model
{
    use HasFactory;
    protected $table = "devenir_prestataires";
    protected $guarded = ['id'];
    protected $fillable = 
    [
        "nom", 
        "prenoms", 
        "civilite", 
        "date_naissance", 
        "situation_matrimoniale",
        "nombre_enfant", 
        "telephone1",
        "telephone2",
        "whatsapp",
        "email",
        "ethnie",
        "commune",
        "quartier",
        "photo",
        "activite",
        "annee_experience",
        "pretention_salairiale",
        "zone_intervention",
        "personne_contact",
        "reference", 
        'reference_contact',
        "alphabetisation",
        "dernier_diplome",
        "mode_travail",
        "disponibilite",
        "nature_piece",
        "numero_piece",
        "rencontre_allo_service",
        "date_appel", 
        "copie_piece",
        "copie_dernier_diplome",
        "catalogue_realisation",
        "observation"
    ];

}
