<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Pays;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaysController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['pays' => $this->pays()], 'Liste des pays');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nom' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $pays = new Pays();
            $pays->nom = $request->nom;
            $pays->save();

            return $this->sendResponse(
                ['pays' => $this->pays()],
                'Un pays a été ajouté avec success. Retour de la liste des pays'
            );
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($idPays)
    {
        try {
            $pays = Pays::findOrFail($idPays);

            if ($pays) {
                return $this->sendResponse(['pays' => $pays], 'Detail du pays');
            } else {
                return $this->sendError('Cet pays n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pays $pays)
    {
        try {
            if ($pays) {

                $validator = Validator::make($request->all(), [
                    'nom' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
                }

                $pays->nom = $request->nom;
                $pays->save();

                return $this->sendResponse(
                    ['pays' => $this->pays()],
                    'Pays edité avec succes. Retour de la liste des pays'
                );
            } else {
                return $this->sendError('Cet pays n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idPays)
    {
        try {
            $pays = Pays::findOrFail($idPays);

            if ($pays) {
                $pays->delete();

                return $this->sendResponse(['pays' => $this->pays()], 'Pays supprimer avec succes. Retour de la liste des Pays');
            } else {
                return $this->sendError('Cet pays n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function pays()
    {
        $pays = Pays::with("region")->get();
        return $pays;
    }
}