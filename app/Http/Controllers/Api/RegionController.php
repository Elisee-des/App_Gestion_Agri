<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Region;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['regions' => $this->regions()], 'Liste des regions');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'pays_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $region = new Region();
            $region->nom = $request->nom;
            $region->pays_id = $request->pays_id;
            $region->save();

            return $this->sendResponse(
                ['region' => $this->regions()],
                'Une region a été ajouté avec success. Retour de la liste des regions'
            );
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idRegion)
    {
        try {
            $region = Region::findOrFail($idRegion);

            if ($region) {
                return $this->sendResponse(['region' => $region], 'Detail de la region');
            } else {
                return $this->sendError('Cette region n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        try {
            if ($region) {

                $validator = Validator::make($request->all(), [
                    'nom' => 'required',
                    'pays_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
                }

                $region->nom = $request->nom;
                $region->pays_id = $request->pays_id;
                $region->save();

                return $this->sendResponse(
                    ['regions' => $this->regions()],
                    'Region edité avec succes. Retour de la liste des regions'
                );
            } else {
                return $this->sendError('Cette region n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idRegion)
    {
        try {
            $region = Region::findOrFail($idRegion);

            if ($region) {
                $region->delete();

                return $this->sendResponse(['regions' => $this->regions()], 'Region supprimer avec succes. Retour de la liste des regions');
            } else {
                return $this->sendError('Cette region n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function regions()
    {
        $regions = Region::orderBy('created_at', 'desc')->get();
        return $regions;
    }
}
