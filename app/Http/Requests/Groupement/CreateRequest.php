<?php

namespace App\Http\Requests\Groupement;

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
            "denomination" => "required",
            "lieu" => "required",
            "faitiere_id" => "required",
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
            'denomination.required' => "Une denomination dois être fourni",
            'faitiere_id.required' => "Une faitiere dois être fourni",
            'lieu.required' => "Un lieu dois être fourni",
        ];
    }
}
