<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory, Uuids;

    protected $table='provinces';

    protected $fillable =[
        'nom',
        'region_id',
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function groupements() {
        return $this->hasMany(Groupement::class);
    }

}
