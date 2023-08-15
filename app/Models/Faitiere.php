<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faitiere extends Model
{
    use HasFactory, Uuids;

    protected $table='faitieres';

    protected $fillable =[
        'pays_id',
        'region_id',
        'nom',
        'logo',
        'email',
        'telephone',
    ];

    public function groupements() {
        return $this->hasMany(Groupement::class);
    }

    public function pays() {
        return $this->belongsTo(Pays::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

}
