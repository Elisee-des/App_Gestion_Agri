<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory, Uuids;
    
    protected $table='productions';
    
    protected $fillable =[
        'producteur_id',
        'type_culture',
        'bio_quantite_semences',
        'bio_cout_semences',
        'bio_quantite_fo',
        'bio_cout_fo',
        'bio_quantite_fertinova',
        'bio_cout_fertinova',
        'bio_quantite_autres_fertilisants',
        'bio_cout_autres_fertilisants',
        'bio_quantite_pesticide_bio',
        'bio_cout_pesticide_bio',
        'bio_quantite_farine_nem',
        'bio_cout_farine_nem',
        'bio_quantite_huile_nem',
        'bio_cout_huile_nem',
        'bio_quantite_fongicide',
        'bio_cout_fongicide',
        'bio_quantite_autres_produits_phyto',
        'bio_cout_autres_produits_phyto',
        'conv_quantite_uree',
        'conv_cout_uree',
        'conv_quantite_npk',
        'conv_cout_npk',
        'conv_quantite_autres_fertilisants',
        'conv_cout_autres_fertilisants',
        'conv_quantite_herbicide',
        'conv_cout_herbicide',
        'conv_cout_planage_sols',
        'conv_cout_labour_sol',
    ];

    public function producteur()
    {
        return $this->belongsTo(Producteur::class);
    }

    public function suiteProductions()
    {
        return $this->hasMany(SuiteProduction::class);
    }
}
