<?php

namespace App\Http\Requests\Producteur;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nom" => "required",
            "prenom" => "required",
            "sexe" => "required",
            "telephone" => "required",
            "date_naissance" => "required",
            "village" => "required",
            "age" => "required",
            "localisation" => "required",
            "situation_matrimoniale" => "required",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            "success" => false,
            "error" => true,
            "message" => "Erreur de validation",
            "errorsList" => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nom.required' => "Un nom dois être fourni",
            'prenom.required' => "Un prenom dois être fourni",
            'sexe.required' => "Un sexe dois être fourni",
            'age.required' => "Un age dois être fourni",
            'localisation.required' => "Une localisation dois être fourni",
            'telephone.required' => "Un telephone dois être fourni",
            'date_naissance.required' => "Une date de naissance dois être fourni",
            'village.required' => "Un village dois être fourni",
            'situation_matrimoniale.required' => "Une situation matrimoniale dois être fourni",
        ];
    }
}
