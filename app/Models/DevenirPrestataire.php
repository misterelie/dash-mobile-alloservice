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

    public function ethnie(){
        return $this->belongsTo(Ethnie::class, "ethnie_id")->where(["deleted" => 0]);
    }

    //* Alphabet 
    public function alphabet(){
        return $this->belongsTo(Alphabet::class, "alphabet_id")->where(["deleted" => 0]);
    }

     //* Diplome :
     public function diplome(){
        return $this->belongsTo(Diplome::class, "diplome_id")->where(["deleted" => 0]);
    }

    //* Dispo 
    public function dispo(){
        return $this->belongsTo(Dispo::class, "dispo_id");
    }

    //* Piece
    public function piece(){
        return $this->belongsTo(Piece::class, "piece_id");
    }

    //* Canal
    public function canal(){
        return $this->belongsTo(Canal::class, "canal_id");
    }

}
