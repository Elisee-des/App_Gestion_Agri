<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuiteProduction extends Model
{
    use HasFactory;

    protected $table='suite_productions';

    protected $fillable =[
        'production_id',
        'cout_semis_en_ligne',
        'cout_demarage',
        'cout_premier_sarclage',
        'cout_second_sarclage',
        'cout_troisieme_sarclage',
        'cout_epandage_engais',
        'cout_traitement_phyto',
        'nombre_parcelles',
    ];

    public function production()
    {
        return $this->belongsTo(Production::class);
    }

    public function recolteVentes()
    {
        return $this->hasMany(RecolteVente::class);
    }
}
