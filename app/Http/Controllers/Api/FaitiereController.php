<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\Faitiere;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FaitiereController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['faitieres' => $this->faitieres()], 'Liste des faitieres');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'pays_id' => 'required',
                'region_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $faitiere = new Faitiere();
            $faitiere->nom = $request->nom;
            $faitiere->telephone = $request->telephone;
            $faitiere->email = $request->email;
            $faitiere->pays_id = $request->pays_id;
            $faitiere->region_id = $request->region_id;

            
            if ($request->logo != null) {

                $photo_64 = $request->logo; //your base64 encoded data
                // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                $file = str_replace($replace, '', $photo_64);
                $myImage = str_replace(' ', '+', $file);
                $filename = Str::slug($request->nom) . '.png';

                Storage::disk('public')->put('uploads/faitiere/' . $filename, base64_decode($myImage));
                $path = 'uploads/faitiere/' . $filename;

                $faitiere->logo = $path;
            }
            $faitiere->save();


            return $this->sendResponse(['faitieres' => $this->faitieres()], 'Une faitiere a été ajouté avec success. Retour de la liste des faitieres');
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faitiere $faitiere)
    {
        try {

            if ($faitiere) {
                return $this->sendResponse(['faitiere' => $faitiere], 'Detail de la faitiere');
            } else {
                return $this->sendError('Cette faitiere n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faitiere $faitiere)
    {
           try {

            $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'pays_id' => 'required',
                'region_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            if ($faitiere) {
                $faitiere->nom = $request->nom;
                $faitiere->telephone = $request->telephone;
                $faitiere->email = $request->email;
                $faitiere->pays_id = $request->pays_id;
                $faitiere->region_id = $request->region_id;

                
            if ($request->logo != null) {

                $photo_64 = $request->logo; //your base64 encoded data
                // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                $file = str_replace($replace, '', $photo_64);
                $myImage = str_replace(' ', '+', $file);
                $filename = Str::slug($request->nom) . '.png';

                Storage::disk('public')->put('uploads/faitiere/' . $filename, base64_decode($myImage));
                $path = 'uploads/faitiere/' . $filename;

                $faitiere->logo = $path;
            }
                $faitiere->save();

                return $this->sendResponse(['faitieres' => $this->faitieres()], 'Une faitiere a été mise a jour avec success. Retour de la liste des faitieres');
            } else {
                return $this->sendError('Cette faitiere n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faitiere $faitiere)
    {
        try {
            if ($faitiere) {
            if ($faitiere->groupements !=null) {
                $faitiere->delete();
                return $this->sendResponse(['faitieres' => $this->faitieres()], 'faitiere supprimer avec succes. Une faitiere a été mise a jour avec success. Retour de la liste des faitieres');
            } else {
                return $this->sendError('Erreur de suppression','Il existe des groupements liés à cette faitières', 401);
            }
            } else {
                return $this->sendError('Erreur de suppression','Cette faitiere n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function faitieres()
    {
        $faitieres = Faitiere::with(['pays', 'region'])->orderBy('created_at', 'desc')->get();
        return $faitieres;
    }
}
