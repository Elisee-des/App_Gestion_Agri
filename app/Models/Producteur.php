<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producteur extends Model
{
    use HasFactory, Uuids;
    

    protected $table='producteurs';

    protected $fillable =[
        'groupement_id',
        'nom',
        'prenom',
        'sexe',
        'age',
        'localisation',
        'photo',
        'telephone',
        'date_naissance',
        'village',
        'situation_matrimoniale',
        'nombre_enfant',
    ];

    public function productions()
    {
        return $this->hasMany(Production::class);
    }
}
