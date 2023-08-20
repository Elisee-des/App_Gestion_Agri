<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvincesController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['provinces' => $this->provinces()], 'Liste des provinces');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'region_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $province = new Province();
            $province->nom = $request->nom;
            $province->region_id = $request->region_id;
            $province->save();

            return $this->sendResponse(
                ['provinces' => $this->provinces()],
                'Une province a été ajouté avec success. Retour de la liste des provinces'
            );
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Province $province)
    {
        try {

            if ($province) {
                return $this->sendResponse(['province' => $province], 'Detail de la province');
            } else {
                return $this->sendError('Cette province n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Province $province)
    {
        try {
            if ($province) {

                $validator = Validator::make($request->all(), [
                    'nom' => 'required',
                    'region_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
                }

                $province->nom = $request->nom;
                $province->region_id = $request->region_id;
                $province->save();

                return $this->sendResponse(
                    ['provinces' => $this->provinces()],
                    'Province edité avec succes. Retour de la liste des provinces'
                );
            } else {
                return $this->sendError('Cette province n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Province $province)
    {
        try {

            if ($province) {
                $province->delete();

                return $this->sendResponse(['provinces' => $this->provinces()], 'Provinces supprimer avec succes. Retour de la liste des provinces');
            } else {
                return $this->sendError('Cette province n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function provinces()
    {
        $provinces = Province::with("region")->get();
        return $provinces;
    }
}
