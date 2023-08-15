<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecolteVente extends Model
{
    use HasFactory;

    protected $table='recolte_ventes';

    protected $fillable =[
        'suite_production_id',
        'quantite_recoltee',
        'cout_recolte',
        'cout_secouage',
        'cout_vannage',
        'cout_transport',
        'quantite_autoconsommee',
        'quantite_vendue_ailleurs',
        'prix_vente_ailleurs',
        'quantite_vente_olvea',
        'prix_vente_olvea',
        'quantite_perdue',
        'main_oeuvre_familiale',
    ];

    public function suiteProduction()
    {
        return $this->belongsTo(SuiteProduction::class);
    }
}
