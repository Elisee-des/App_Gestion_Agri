<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory, Uuids;

    protected $table='pays';

    protected $fillable =[
        'nom',
    ];

    public function faitieres() {
        return $this->hasMany(Faitiere::class);
    }

    public function region() {
        return $this->hasMany(Region::class)->with('provinces');
    }

    public function groupements() {
        return $this->hasMany(Groupement::class);
    }
}
