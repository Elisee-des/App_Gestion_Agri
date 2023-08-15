<?php

namespace Database\Seeders;

use App\Models\Groupement;
use App\Models\Producteur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProducteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupementId = Groupement::first()->id;

        Producteur::create([
            'nom' => 'Ouedraogo',
            'prenom' => 'Alidou',
            'sexe' => 'Masculin',
            'age' => '45',
            'localisation' => 'http:map.sa_localisation',
            'telephone' => '678456334',
            'date_naissance' => '19/02/1980',
            'village' => 'Orodara',
            'situation_matrimoniale' => 'Marie',
            'nombre_enfant' => '4',
            'groupement_id' => $groupementId,
            'photo' => 'image_producteur',
        ]);

        Producteur::create([
            'nom' => 'Kabore',
            'prenom' => 'Francois',
            'sexe' => 'Masculin',
            'age' => '45',
            'localisation' => 'http:map.sa_localisation',
            'telephone' => '578456334',
            'date_naissance' => '19/02/1985',
            'village' => 'fasio',
            'situation_matrimoniale' => 'Marie',
            'nombre_enfant' => '1',
            'groupement_id' => $groupementId,
            'photo' => 'image_producteur',
        ]);

        Producteur::create([
            'nom' => 'Kabore',
            'prenom' => 'Francois',
            'sexe' => 'Masculin',
            'age' => '45',
            'localisation' => 'http:map.sa_localisation',
            'telephone' => '578456334',
            'date_naissance' => '19/02/1985',
            'village' => 'fasio',
            'situation_matrimoniale' => 'Marie',
            'nombre_enfant' => '1',
            'groupement_id' => $groupementId,
            'photo' => 'image_producteur',
        ]);

        Producteur::create([
            'nom' => 'Kabore',
            'prenom' => 'Francois',
            'sexe' => 'Masculin',
            'age' => '45',
            'localisation' => 'http:map.sa_localisation',
            'telephone' => '578456334',
            'date_naissance' => '19/02/1985',
            'village' => 'fasio',
            'situation_matrimoniale' => 'Marie',
            'nombre_enfant' => '1',
            'groupement_id' => $groupementId,
            'photo' => 'image_producteur',
        ]);
    }
}
