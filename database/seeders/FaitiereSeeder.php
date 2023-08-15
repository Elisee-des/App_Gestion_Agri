<?php

namespace Database\Seeders;

use App\Models\Faitiere;
use App\Models\Pays;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaitiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pays = Pays::latest()->first()->id;
        $region = Region::latest()->first()->id;

        Faitiere::create([
            'nom' => 'faitiere test 1',
            'email' => 'faitiere_1@gmail.com',
            'telephone' => '78567897',
            'pays_id' => $pays,
            'region_id' => $region,
        ]);

        Faitiere::create([
            'nom' => 'faitiere test 2',
            'email' => 'faitiere_2@gmail.com',
            'telephone' => '58567897',
            'pays_id' => $pays,
            'region_id' => $region,

        ]);
    }
}
