<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupement extends Model
{
    use HasFactory, Uuids;

    protected $table='groupements';

    protected $fillable =[
        'faitiere_id',
        'region_id',
        'province_id',
        'pays_id',
        'denomination',
        'logo',
        'lieu',
        'email',
        'telephone',
    ];

    public function faitiere() {
        return $this->belongsTo(Faitiere::class);
    }

    public function province() {
        return $this->belongsTo(Province::class);
    }

    public function pays() {
        return $this->belongsTo(Pays::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }
}
