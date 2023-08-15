<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Producteur\CreateRequest;
use App\Http\Requests\Producteur\UpdateRequest;
use App\Models\Producteur;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProducteurController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['producteurs' => $this->producteurs()], 'Les des producteurs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        try {
            $producteur = new Producteur();
            $producteur->nom = $request->nom;
            $producteur->prenom = $request->prenom;
            $producteur->sexe = $request->sexe;
            $producteur->telephone = $request->telephone;
            $producteur->date_naissance = $request->date_naissance;
            $producteur->village = $request->village;
            $producteur->age = $request->age;
            $producteur->photo = $request->photo;
            $producteur->situation_matrimoniale = $request->situation_matrimoniale;
            $producteur->nombre_enfant = $request->nombre_enfant;
            $producteur->localisation = $request->localisation;
            $producteur->groupement_id = $request->groupement_id;

            if ($request->photo != null) {

                $photo_64 = $request->photo; //your base64 encoded data
                // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                $file = str_replace($replace, '', $photo_64);
                $myImage = str_replace(' ', '+', $file);
                $filename = Str::slug($request->nom . $request->prenom) . '.png';

                Storage::disk('public')->put('uploads/producteurs/' . $filename, base64_decode($myImage));
                $path = 'uploads/producteurs/' . $filename;

                $producteur->photo = $path;
            }
            $producteur->save();

            return $this->sendResponse(['producteurs' => $this->producteurs()], 'Un Producteur a été ajouté avec success. Retour de la liste des producteurs');
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producteur $producteur)
    {
        try {

            if ($producteur) {
                return $this->sendResponse(['producteur' => $producteur], 'Detail du producteur');
            } else {
                return $this->sendError('Ce producteur n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Producteur $producteur)
    {

        try {
            if ($producteur) {
                $producteur->nom = $request->nom;
                $producteur->prenom = $request->prenom;
                $producteur->sexe = $request->sexe;
                $producteur->telephone = $request->telephone;
                $producteur->age = $request->age;
                $producteur->localisation = $request->localisation;
                $producteur->date_naissance = $request->date_naissance;
                $producteur->village = $request->village;
                $producteur->situation_matrimoniale = $request->situation_matrimoniale;
                $producteur->nombre_enfant = $request->nombre_enfant;

                if ($request->photo != null) {
                    
                    $photo_64 = $request->photo; //your base64 encoded data
                    // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                    $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                    $file = str_replace($replace, '', $photo_64);
                    $myImage = str_replace(' ', '+', $file);
                    $filename = Str::slug($request->nom . $request->prenom) . '.png';

                    Storage::disk('public')->put('uploads/producteurs/' . $filename, base64_decode($myImage));
                    $path = 'uploads/producteurs/' . $filename;

                    $producteur->photo = $path;
                }

                $producteur->save();

                return $this->sendResponse(['producteurs' => $this->producteurs()], 'Producteur edité avec succes. Retour de la liste des producteurs');
            } else {
                return $this->sendError('Ce producteur n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producteur $producteur)
    {
        try {
            if ($producteur) {
                $producteur->delete();

                return $this->sendResponse(['producteurs' => $this->producteurs()], 'Producteur supprimer avec succes. Retour de la liste des producteurs.');
            } else {
                return $this->sendError('Ce producteur n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function producteurs()
    {
        $producteurs = Producteur::orderBy('created_at', 'desc')->get();
        return $producteurs;
    }
}
