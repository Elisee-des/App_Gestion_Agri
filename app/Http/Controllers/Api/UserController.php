<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(['users' => $this->users()], 'Liste des utilisateurs');
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
                'email' => 'required',
                'telephone' => 'required',
                'photo' => 'required',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
            }

            $user = new User();
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->telephone = $request->telephone;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->faitiere_id = $request->faitiere_id;
            $password = $this->generate_password(8);
            $user->password = Hash::make($password);

            if ($request->photo != null) {

                $photo_64 = $request->photo; //your base64 encoded data
                // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                $file = str_replace($replace, '', $photo_64);
                $myImage = str_replace(' ', '+', $file);
                $filename = Str::slug($request->nom . $request->prenom) . '.png';

                Storage::disk('public')->put('uploads/users/' . $filename, base64_decode($myImage));
                $path = 'uploads/users/' . $filename;

                $user->photo = $path;
            }
            $user->save();

            $this->sendMail($user, $password);

            return $this->sendResponse(
                ['users' => $this->users()],
                'Un Utilisateur a été ajouté avec success. Retour de la liste des utilisateurs'
            );
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                return $this->sendResponse(['user' => $user], 'Detail de l\'utilisateur');
            } else {
                return $this->sendError('Cet utilisateur n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {
            $user = User::find($id);
            if ($user) {

                $validator = Validator::make($request->all(), [
                    'nom' => 'required',
                    'prenom' => 'required',
                    'email' => 'required',
                    'telephone' => 'required',
                    'photo' => 'required',
                    'role' => 'required',
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
                }

                $user->nom = $request->nom;
                $user->prenom = $request->prenom;
                $user->telephone = $request->telephone;
                $user->role = $request->role;
                $user->email = $request->email;
                $user->faitiere_id = $request->faitiere_id;
                $password = $this->generate_password(8);
                $user->password = Hash::make($password);

                if ($request->photo != null) {

                    $photo_64 = $request->photo; //your base64 encoded data
                    // $extension = explode('/', explode(':', substr($pdf_64, 0, strpos($pdf_64, ';')))[1])[1];   // .jpg .png .pdf
                    $replace = substr($photo_64, 0, strpos($photo_64, ',') + 1);
                    $file = str_replace($replace, '', $photo_64);
                    $myImage = str_replace(' ', '+', $file);
                    $filename = Str::slug($request->nom . $request->prenom) . '.png';

                    Storage::disk('public')->put('uploads/users/' . $filename, base64_decode($myImage));
                    $path = 'uploads/users/' . $filename;

                    $user->photo = $path;
                }
                $user->save();
                $this->sendMail($user, $password);


                return $this->sendResponse(
                    ['users' => $this->users()],
                    'Utilisateur edité avec succes. Retour de la liste des utilisateurs'
                );
            } else {
                return $this->sendError('Cet utilisateur n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $user = User::find($id);

            if ($user) {
                $user->delete();

                return $this->sendResponse(['users' => $this->users()], 'Utilisation supprimer avec succes. Retour de la liste des utilisateurs');
            } else {
                return $this->sendError('Cette utilisateur n\'existe pas', 401);
            }
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function users()
    {
        $users = User::with('faitiere')->orderBy('created_at', 'desc')->get();
        return  $users;
    }


    public function generate_password($length)
    {
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' .
            '0123456789!@#$%&';

        $str = '';
        $max = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++)
            $str .= $chars[random_int(0, $max)];

        return $str;
    }

    public function sendMail($user, $password)
    {
        $data['nom'] = $user->nom;
        $data['prenom'] = $user->prenom;
        $data['email'] = $user->email;
        $data['telephone'] = $user->telephone;
        $data['password'] = $password;
        $data['created_at'] = $user->created_at;

        Mail::send('notify', ['data' => $data], function ($message) use ($data) {
            $message->to($data["email"])->subject('Notification');
        });
    }
}
