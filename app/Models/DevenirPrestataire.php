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
        "situation_matri",
        "nombre_enfant", 
        "telephone1",
        "telephone2",
        "whatsapp",
        "email",
        "ethnie_id",
        "commune_id",
        "quartier_id",
        "photo",
        "domaine_id",
        "annee_experience",
        "pretention_salairiale",
        "zone_intervention",
        "personne_contact",
        "reference", 
        'reference_contact',
        "alphabet_id",
        "diplome_id",
        "mode_id",
        "dispo_id",
        "piece_id",
        "numero_piece",
        "canal_id",
        "date_appel", 
        "copie_piece",
        "copie_dernier_diplome",
        "catalogue_realisation",
        "avis"
    ];

    //* Mode
    public function mode(){
        return $this->belongsTo(Mode::class, "mode_id")->where(["deleted" => 0]);
    }

}
