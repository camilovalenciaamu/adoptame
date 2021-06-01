<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|between:3,100',
            'specie' => 'required|string',
            'race' => 'required|string',
            'date_of_birth' => 'required|date',
            'photo' => 'required|mimes:jpg,jpeg,png|max:2000',
            'institution_id' => 'required|integer',
        ];
        if ($this->getMethod() == 'PUT') {
            $rules = [
                'name' => 'string|between:3,100',
                'specie' => 'string',
                'race' => 'string',
                'date_of_birth' => 'date',
                'photo' => 'mimes:jpg,jpeg,png|max:2000',
                'institution_id' => 'integer',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la mascota es requerido',
            'name.string' => 'El nombre de la mascota debe ser una cadena de texto',
            'name.between' => 'El nombre debe contener entre 3 y 100 caracteres',

            'specie.required' => 'La especia de la mascota es requerida',
            'specie.string' => 'La especia de la mascota debe ser una cadena de texto',

            'race.required' => 'La raza de la mascota es requerida',
            'race.string' => 'La raza de la mascota debe ser una cadena de texto',

            'date_of_birth.required' => 'La fecha de nacimiento de la mascota es requerida',
            'date_of_birth.string' => 'La fecha de nacimiento de la mascota debe ser una cadena de texto',

            'photo.required' => 'La foto de la mascota es requerida',
            'photo.mimes' => 'La imagen debe estar en formato PNG o JPG',
            'photo.uploaded' => [
                'file' => 'La imagen no debe pesar más de 2MB',
            ],

            'institution_id.required' => 'La institución a la cual pertenece la mascota es requerida',
            'institution_id.integer' => 'La institución a la cual pertenece mascota debe ser un id de tipo entero',
        ];
    }
}