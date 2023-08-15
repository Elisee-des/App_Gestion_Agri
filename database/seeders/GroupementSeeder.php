<?php

namespace Database\Seeders;

use App\Models\Faitiere;
use App\Models\Groupement;
use App\Models\Pays;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faitiereId = Faitiere::latest()->first()->id;
        $pays = Pays::latest()->first()->id;
        $region = Region::latest()->first()->id;
        $province = Province::latest()->first()->id;


        Groupement::create([
            'denomination' => 'denomination test 1',
            'lieu' => 'bobo',
            'email' => 'groupement_1@gmail.com',
            'telephone' => '78567897',
            'pays_id' => $pays,            
            'region_id' => $region,
            "province_id"  => $province,
            "faitiere_id"  => $faitiereId
        ]);

        Groupement::create([
            'denomination' => 'denomination test 2',
            'lieu' => 'Gaoua',
            'email' => 'groupemen_1@gmail.com',
            'telephone' => '78567897',
            'pays_id' => $pays,
            'province_id'  => $province,
            'region_id' => $region,
            'faitiere_id'  => $faitiereId
        ]);
    }
}
