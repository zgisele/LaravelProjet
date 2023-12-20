<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditFormationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nom'=>'required',
            'duree'=>'required',
            'date_debut'=>'required',
            'lieu'=>'required'
        ];
    }

    public function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(response()->json([

            'success'=>false,
            'error'=>true,
            'message'=>'Erreure de validation',
            'errorsListe'=> $validator->errors(),
        ]

        )); 
    }
    public function messages()
    {
        return [

            'nom.required'=>'Un nom de formation  doit etre fournie',
            'duree.required'=>'Une duree de formation  doit etre fournie',
            'date_debut.required'=>'Une de debut de formation doit etre fournie',
            'lieu.required'=>'Un lieur pour la formation doit etre fournie'
        ];
    }
}
