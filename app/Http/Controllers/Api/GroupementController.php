<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Groupement\CreateRequest;
use App\Models\Faitiere;
use App\Models\Groupement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class GroupementController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['groupements' => $this->groupements()], 'Liste des groupements');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                
        try {
            $validator = Validator::make($request->all(), [
                'denomination' => 'required',
                //'lieu' => 'required',
                'telephone' => 'required',
                'email' => 'required',
                'faitiere_id' => 'required',
                'region_id' => 'required',
                'province_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $groupement = new Groupement();
            $groupement->denomination = $request->denomination;
            //$groupement->lieu = $request->lieu;
            $groupement->telephone = $request->telephone;
            $groupement->email = $request->email;
            $groupement->faitiere_id = $request->faitiere_id;
            $groupement->region_id = $request->region_id;
            $groupement->pays_id = $request->pays_id;
            $groupement->province_id = $request->province_id;

            if ($request->logo != null) {

                $photo_64 = $request->logo; //your base64 encoded data
                // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                $file = str_replace($replace, '', $photo_64);
                $myImage = str_replace(' ', '+', $file);
                $filename = Str::slug($request->denomination) . '.png';

                Storage::disk('public')->put('uploads/groupement/' . $filename, base64_decode($myImage));
                $path = 'uploads/groupement/' . $filename;

                $groupement->logo = $path;
            }
            $groupement->save();

            return $this->sendResponse(
                ['groupements' => $this->groupements()],
                'Un groupement a été ajouté avec success. Retour de la liste des groupements'
            );
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupement $groupement)
    {
        try {

            if ($groupement) {
                return $this->sendResponse(['groupement' => $groupement], 'Detail du groupement');
            } else {
                return $this->sendError('Cet groupement n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groupement $groupement)
    {
        try {
            if ($groupement) {

                $validator = Validator::make($request->all(), [
                    'denomination' => 'required',
                    'telephone' => 'required',
                    'email' => 'required',
                    'pays_id' => 'required',
                    'faitiere_id' => 'required',
                    'region_id' => 'required',
                    'province_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
                }

                $groupement->denomination = $request->denomination;
                //$groupement->lieu = $request->lieu;
                $groupement->telephone = $request->telephone;
                $groupement->email = $request->email;
                $groupement->faitiere_id = $request->faitiere_id;
                $groupement->pays_id = $request->pays_id;
                $groupement->region_id = $request->region_id;
                $groupement->province_id = $request->province_id;



                if ($request->logo != null) {

                    $photo_64 = $request->logo; //your base64 encoded data
                    // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                    $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                    $file = str_replace($replace, '', $photo_64);
                    $myImage = str_replace(' ', '+', $file);
                    $filename = Str::slug($request->denomination) . '.png';

                    Storage::disk('public')->put('uploads/groupement/' . $filename, base64_decode($myImage));
                    $path = 'uploads/groupement/' . $filename;

                    $groupement->logo = $path;
                }
                $groupement->save();

                return $this->sendResponse(
                    ['groupements' => $this->groupements()],
                    'Groupement edité avec succes. Retour de la liste des groupements'
                );
            } else {
                return $this->sendError('Cet groupement n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupement $groupement)
    {
        try {
            if ($groupement) {
                $groupement->delete();

                return $this->sendResponse(['groupements' => $this->groupements()], 'Groupement supprimer avec succes. Retour de la liste des groupements');
            } else {
                return $this->sendError('Cette groupement n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function groupements()
    {
        $groupements = Groupement::with(['faitiere','province','region'])->orderBy('created_at', 'desc')->get();
        return $groupements;
    }
}
