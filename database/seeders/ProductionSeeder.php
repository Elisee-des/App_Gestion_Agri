<?php

namespace Database\Seeders;

use App\Models\Producteur;
use App\Models\Production;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producteurId = Producteur::first()->id;

        Production::create([
            'type_culture' => 'Hors sol',
            "producteur_id"  => $producteurId
        ]);

        Production::create([
            'type_culture' => 'sol',
            "producteur_id"  => $producteurId
        ]);

        Production::create([
            'type_culture' => 'sol',
            "producteur_id"  => $producteurId
        ]);

        Production::create([
            'type_culture' => 'Hors sol',
            "producteur_id"  => $producteurId
        ]);
    }
}
