<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePrestation extends Model
{
    use HasFactory;
    protected $table = "demande_prestations";
    protected $guarded = ['id'];
    protected $fillable = ["prestation_demande", "mode_travail", "salaire_propose", "age", "ethnie", "date", "observation"];
}
