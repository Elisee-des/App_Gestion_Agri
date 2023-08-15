<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Production;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['productions' => $this->productions()], 'Liste des productions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'type_culture' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $production = new Production();
            $production->type_culture = $request->type_culture;
            $production->bio_quantite_semences = $request->bio_quantite_semences;
            $production->bio_cout_semences = $request->bio_cout_semences;
            $production->bio_quantite_fo = $request->bio_quantite_fo;
            $production->bio_cout_fo = $request->bio_cout_fo;
            $production->bio_quantite_fertinova = $request->bio_quantite_fertinova;
            $production->bio_cout_fertinova = $request->bio_cout_fertinova;
            $production->bio_quantite_autres_fertilisants = $request->bio_quantite_autres_fertilisants;
            $production->bio_quantite_pesticide_bio = $request->bio_quantite_pesticide_bio;
            $production->bio_quantite_autres_fertilisants = $request->bio_quantite_autres_fertilisants;
            $production->bio_cout_autres_fertilisants = $request->bio_cout_autres_fertilisants;
            $production->bio_quantite_pesticide_bio = $request->bio_quantite_pesticide_bio;
            $production->bio_cout_pesticide_bio = $request->bio_cout_pesticide_bio;
            $production->bio_quantite_farine_nem = $request->bio_quantite_farine_nem;
            $production->bio_cout_farine_nem = $request->bio_cout_farine_nem;
            $production->bio_quantite_huile_nem = $request->bio_quantite_huile_nem;
            $production->bio_cout_huile_nem = $request->bio_cout_huile_nem;
            $production->bio_quantite_fongicide = $request->bio_quantite_fongicide;
            $production->bio_cout_fongicide = $request->bio_cout_fongicide;
            $production->bio_quantite_autres_produits_phyto = $request->bio_quantite_autres_produits_phyto;
            $production->bio_cout_autres_produits_phyto = $request->bio_cout_autres_produits_phyto;
            $production->conv_quantite_uree = $request->conv_quantite_uree;
            $production->conv_cout_uree = $request->conv_cout_uree;
            $production->conv_quantite_npk = $request->conv_quantite_npk;
            $production->conv_cout_npk = $request->conv_cout_npk;
            $production->conv_quantite_autres_fertilisants = $request->conv_quantite_autres_fertilisants;
            $production->conv_cout_autres_fertilisants = $request->conv_cout_autres_fertilisants;
            $production->conv_cout_herbicide = $request->conv_cout_herbicide;
            $production->conv_cout_planage_sols = $request->conv_cout_planage_sols;
            $production->conv_cout_labour_sols = $request->conv_cout_labour_sols;
            $production->producteur_id = $request->producteur_id;
            $production->save();

            return $this->sendResponse(['productions' => $this->productions()],
             'Une production a été ajouté avec success. Retour de la liste des productions');
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Production $production)
    {
        try {

            if ($production) {
                return $this->sendResponse(['productions' => $this->productions()], 'Detail de la production');
            } else {
                return $this->sendError('Cette production n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Production $production)
    {
        try {
            if ($production) {

                $validator = Validator::make($request->all(), [
                    'type_culture' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
                }

                $production->type_culture = $request->type_culture;
                $production->bio_quantite_semences = $request->bio_quantite_semences;
                $production->bio_cout_semences = $request->bio_cout_semences;
                $production->bio_quantite_fo = $request->bio_quantite_fo;
                $production->bio_cout_fo = $request->bio_cout_fo;
                $production->bio_quantite_fertinova = $request->bio_quantite_fertinova;
                $production->bio_cout_fertinova = $request->bio_cout_fertinova;
                $production->bio_quantite_autres_fertilisants = $request->bio_quantite_autres_fertilisants;
                $production->bio_quantite_pesticide_bio = $request->bio_quantite_pesticide_bio;
                $production->bio_quantite_autres_fertilisants = $request->bio_quantite_autres_fertilisants;
                $production->bio_cout_autres_fertilisants = $request->bio_cout_autres_fertilisants;
                $production->bio_quantite_pesticide_bio = $request->bio_quantite_pesticide_bio;
                $production->bio_cout_pesticide_bio = $request->bio_cout_pesticide_bio;
                $production->bio_quantite_farine_nem = $request->bio_quantite_farine_nem;
                $production->bio_cout_farine_nem = $request->bio_cout_farine_nem;
                $production->bio_quantite_huile_nem = $request->bio_quantite_huile_nem;
                $production->bio_cout_huile_nem = $request->bio_cout_huile_nem;
                $production->bio_quantite_fongicide = $request->bio_quantite_fongicide;
                $production->bio_cout_fongicide = $request->bio_cout_fongicide;
                $production->bio_quantite_autres_produits_phyto = $request->bio_quantite_autres_produits_phyto;
                $production->bio_cout_autres_produits_phyto = $request->bio_cout_autres_produits_phyto;
                $production->conv_quantite_uree = $request->conv_quantite_uree;
                $production->conv_cout_uree = $request->conv_cout_uree;
                $production->conv_quantite_npk = $request->conv_quantite_npk;
                $production->conv_cout_npk = $request->conv_cout_npk;
                $production->conv_quantite_autres_fertilisants = $request->conv_quantite_autres_fertilisants;
                $production->conv_cout_autres_fertilisants = $request->conv_cout_autres_fertilisants;
                $production->conv_cout_herbicide = $request->conv_cout_herbicide;
                $production->conv_cout_planage_sols = $request->conv_cout_planage_sols;
                $production->conv_cout_labour_sols = $request->conv_cout_labour_sols;
                $production->producteur_id = $request->producteur_id;
                $production->save();

                return $this->sendResponse(['productions' => $this->productions()],
                 'production edité avec succes. Retour de la liste des productions');
            } else {
                return $this->sendError('Cette production n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Production $production)
    {
        try {
            if ($production) {
                $production->delete();

                return $this->sendResponse(['productions' => $this->productions()], 'production supprimer avec succes. Retour de la liste des production');
            } else {
                return $this->sendError('Cette production n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function productions()
    {
        $productions = Production::orderBy('created_at', 'desc')->get();
        return $productions;
    }

}
