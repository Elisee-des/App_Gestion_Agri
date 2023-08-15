<?php

namespace Database\Seeders;

use App\Models\Pays;
use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $regions = ['Est', 'Centre', 'Centre-Ouest', 'Centre-Nord', 'Sahel', 'Plateau-Central', 'Nord', 'Hauts-Bassins', 'Sud-Ouest', 'Boucle du Mouhoun', 'Cascades', 'Centre-Est', 'Centre-Sud'];
        foreach ($regions as $key => $region) {
            Region::create([
                'nom' => $region,
                'pays_id' => Pays::where('nom', 'Burkina Faso')->first()->id,
            ]);
        }

        

    }
}
