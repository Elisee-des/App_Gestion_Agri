<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\Producteur;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
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
    public function store(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'prenom' => 'required',
                'sexe' => 'required',
                'age' => 'required',
                'age' => 'required',
                'localisation' => 'required',
                'photo' => 'required',
                'telephone' => 'required',
                'date_naissance' => 'required',
                'village' => 'required',
                'situation_matrimoniale' => 'required',
                'nombre_enfant' => 'required',
                'groupement_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('error', $request->errors(), 400);
                // return $this->errorResponse($request->errors()->all());
            }

            $producteur = new Producteur();
            $producteur->nom = $request->nom;
            $producteur->prenom = $request->prenom;
            $producteur->sexe = $request->sexe;
            $producteur->telephone = $request->telephone;
            $producteur->date_naissance = $request->date_naissance;
            $producteur->village = $request->village;
            $producteur->age = $request->age;
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
            return response()->json('error',$e);
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
    public function update(Request $request, Producteur $producteur)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nom' => 'required',
                'prenom' => 'required',
                'sexe' => 'required',
                'age' => 'required',
                'age' => 'required',
                'localisation' => 'required',
                'photo' => 'required',
                'telephone' => 'required',
                'date_naissance' => 'required',
                'village' => 'required',
                'situation_matrimoniale' => 'required',
                'nombre_enfant' => 'required',
                'groupement_id' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('error', $request->errors(), 400);
                // return $this->errorResponse($request->errors()->all());
            }

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

    function importProducteur(Request $request) {
        // if(!$request->excel){

        //     $error = 'Aucun fichier sélectionné';

        //     return ;

        // }
        
        
        $photo_64 = $request->excel; //your base64 encoded data
        
        // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
        
        $file = str_replace($replace, '', $photo_64);
        $myImage = str_replace(' ', '+', $file);
        $filename = Str::slug('tsssestss') . '.xlsx';
       
        
        $path = Storage::disk('public')->put('uploads/producteurs/' . $filename, base64_decode($myImage));
        $path = 'storage/uploads/producteurs/' . $filename;
        $filepath=$path;
        // return $this->sendResponse(['producteurs' => File::exists($filepath)], 'Producteur edité avec succes');
        
      

            try{
                
                $spreadsheet=IOFactory::load($filepath);
                
                $worksheet=$spreadsheet->getActiveSheet();
                
                $headers=$worksheet->toArray()[0];
                $worksheet->removeRow(1);
                
                $producteurs=$worksheet->toArray();
                foreach ($producteurs as $key => $value) {

                    // $producteurs['nom'] = $value['5'];
                    // $producteurs['prenom'] = $value['4'];
                    // $producteurs['sexe'] = $value['6'];
                    // $producteurs['telephone'] = $value['7'];
                    // $producteurs['date_naissance'] = $value['8'];
                    // $producteurs['village'] = $value['9'];
                    // $producteurs['age'] = $value['10'];
                    // $producteurs['nombre_enfant'] = $value['11'];
                    // $producteurs['localisation'] = $value['11'];
                    // $producteurs['photo'] = $value['11'];
                    //$producteurs['groupement_id'] = $value['11'];
                    // $producteurs['situation_matrimoniale'] = $value['11'];
                   
                    return $this->sendResponse(['producteurs' => $value], 'Producteur edité avec succes');
                    # code...
                }
            // foreach ($produits as $key => $produits) {
            //     // dd($produits);
            //     $produit['numero_de_decision_d_agrement']         = $produits[0];
            //     $produit['date_creation']                         = $produits[1];
            //     $produit['annee']                                 = $produits[2];
            //     $produit['pays_id']                               = Pays::where('is_uemoa',true)->where('nom',  'like', '%' . $produits[3] . '%')->first()->id;
            //     $produit['entreprise']                            = $produits[4];
            //     $produit['numero_de_matricule']                   = $produits[5];
            //     $produit['chapitres_nts']                         = $produits[6];
            //     $produit['nts_du_Produit']                        = $produits[7];
            //     $produit['nts_du_Produit_initiale']               = $produits[8];
            //     $produit['denomination_commerciale_du_produit']   = $produits[9];
            //     $produit['numero_d_agrement_du_produit']          = $produits[10];
            //     $produit['critere_d_agrement']                    = $produits[11];

            //     array_push($this->produits,$produit) ;

            // }
            // // dd($this->produits);
            // foreach ($this->produits as $key => $value) {
                
            //     Produit::create($value);
           
            }
            
           

              catch(\Exception $e){
                return $this->sendResponse(['producteurs' => "odsfdlgk"], 'Producteur edité avec succes');

                $error = $e;
                return $this->sendError('errs', 401);

               
            }

        // }
        // return $this->sendResponse(['producteurs' => "o"], 'Producteur edité avec succes');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producteur $producteur)
    {
        // return $this->sendResponse(['producteurs' => $producteur], 'Producteur supprimer avec succes');
        
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
        $producteurs = Producteur::with('groupement')->orderBy('created_at', 'desc')->get();
        return $producteurs;
    }
}
