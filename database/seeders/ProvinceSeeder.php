<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $provinces = [
            ['nom' => 'Balé', 'region_id' => Region::where('nom', 'Boucle du Mouhoun')->first()->id],
            ['nom' => 'Banwa', 'region_id' => Region::where('nom', 'Boucle du Mouhoun')->first()->id],
            ['nom' => 'Kossi', 'region_id' => Region::where('nom', 'Boucle du Mouhoun')->first()->id],
            ['nom' => 'Mouhoun', 'region_id' => Region::where('nom', 'Boucle du Mouhoun')->first()->id],
            ['nom' => 'Nayala', 'region_id' => Region::where('nom', 'Boucle du Mouhoun')->first()->id],
            ['nom' => 'Sourou', 'region_id' => Region::where('nom', 'Boucle du Mouhoun')->first()->id],
            ['nom' => 'Comoé', 'region_id' => Region::where('nom', 'Cascades')->first()->id],
            ['nom' => 'Léraba', 'region_id' => Region::where('nom', 'Cascades')->first()->id],
            ['nom' => 'Kadiogo', 'region_id' => Region::where('nom', 'Centre')->first()->id],
            ['nom' => 'Boulgou', 'region_id' => Region::where('nom', 'Centre-Est')->first()->id],
            ['nom' => 'Koulpélogo', 'region_id' => Region::where('nom', 'Centre-Est')->first()->id],
            ['nom' => 'Kouritenga', 'region_id' => Region::where('nom', 'Centre-Est')->first()->id],
            ['nom' => 'Bam', 'region_id' => Region::where('nom', 'Centre-Nord')->first()->id],
            ['nom' => 'Namentenga', 'region_id' => Region::where('nom', 'Centre-Nord')->first()->id],
            ['nom' => 'Sanmatenga', 'region_id' => Region::where('nom', 'Centre-Nord')->first()->id],
            ['nom' => 'Boulkiemdé', 'region_id' => Region::where('nom', 'Centre-Ouest')->first()->id],
            ['nom' => 'Sanguié', 'region_id' => Region::where('nom', 'Centre-Ouest')->first()->id],
            ['nom' => 'Sissili', 'region_id' => Region::where('nom', 'Centre-Ouest')->first()->id],
            ['nom' => 'Ziro', 'region_id' => Region::where('nom', 'Centre-Ouest')->first()->id],
            ['nom' => 'Bazèga', 'region_id' => Region::where('nom', 'Centre-Sud')->first()->id],
            ['nom' => 'Nahouri', 'region_id' => Region::where('nom', 'Centre-Sud')->first()->id],
            ['nom' => 'Zoundwéogo', 'region_id' => Region::where('nom', 'Centre-Sud')->first()->id],
            ['nom' => 'Gnagna', 'region_id' => Region::where('nom', 'Est')->first()->id],
            ['nom' => 'Gourma', 'region_id' => Region::where('nom', 'Est')->first()->id],
            ['nom' => 'Komondjari', 'region_id' => Region::where('nom', 'Est')->first()->id],
            ['nom' => 'Kompienga', 'region_id' => Region::where('nom', 'Est')->first()->id],
            ['nom' => 'Tapoa', 'region_id' => Region::where('nom', 'Est')->first()->id],
            ['nom' => 'Houet', 'region_id' => Region::where('nom', 'Hauts-Bassins')->first()->id],
            ['nom' => 'Kenedougou', 'region_id' => Region::where('nom', 'Hauts-Bassins')->first()->id],
            ['nom' => 'Tuy', 'region_id' => Region::where('nom', 'Hauts-Bassins')->first()->id],
            ['nom' => 'Loroum', 'region_id' => Region::where('nom', 'Nord')->first()->id],
            ['nom' => 'Passoré', 'region_id' => Region::where('nom', 'Nord')->first()->id],
            ['nom' => 'Yatenga', 'region_id' => Region::where('nom', 'Nord')->first()->id],
            ['nom' => 'Zondoma', 'region_id' => Region::where('nom', 'Nord')->first()->id],
            ['nom' => 'Ganzourgou', 'region_id' => Region::where('nom', 'Plateau-Central')->first()->id],
            ['nom' => 'Kourwéogo', 'region_id' => Region::where('nom', 'Plateau-Central')->first()->id],
            ['nom' => 'Oubritenga', 'region_id' => Region::where('nom', 'Plateau-Central')->first()->id],
            ['nom' => 'Oudalan', 'region_id' => Region::where('nom', 'Sahel')->first()->id],
            ['nom' => 'Séno', 'region_id' => Region::where('nom', 'Sahel')->first()->id],
            ['nom' => 'Soum', 'region_id' => Region::where('nom', 'Sahel')->first()->id],
            ['nom' => 'Yagha', 'region_id' => Region::where('nom', 'Sahel')->first()->id],
            ['nom' => 'Bougouriba', 'region_id' => Region::where('nom', 'Sud-Ouest')->first()->id],
            ['nom' => 'Ioba', 'region_id' => Region::where('nom', 'Sud-Ouest')->first()->id],
            ['nom' => 'Noumbiel', 'region_id' => Region::where('nom', 'Sud-Ouest')->first()->id],
            ['nom' => 'Poni', 'region_id' => Region::where('nom', 'Sud-Ouest')->first()->id],
        ];

        foreach ($provinces as $key => $province) {
            Province::create([
                'nom' => $province['nom'],
                'region_id' => $province['region_id'],
            ]);
        }
    }
}
