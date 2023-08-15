<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, Uuids;

    protected $table='regions';

    protected $fillable =[
        'nom',
        'pays_id',
    ];

    public function faitieres() {
        return $this->hasMany(Faitiere::class);
    }

    public function pays() {
        return $this->belongsTo(Pays::class);
    }

    public function provinces() {
        return $this->hasMany(Province::class);
    }

    public function groupements() {
        return $this->hasMany(Groupement::class);
    }

}
