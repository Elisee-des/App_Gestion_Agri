<?php

namespace App\Http\Requests\Faitiere;

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
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $this->sen;
        // "errorsList" => $validator->errors()

    }

    public function messages()
    {
        return [
            'nom.required' => "Un nom dois être fourni",
        ];
    }
}

