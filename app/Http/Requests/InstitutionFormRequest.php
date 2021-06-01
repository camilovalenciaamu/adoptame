<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string|between:5,120',
            'phone' => 'required|numeric|digits_between:7,10',
            'email' => 'required|email',
        ];
        if ($this->getMethod() == 'PUT') {
            $rules = [
                'name' => 'string|between:5,120',
                'phone' => 'numeric|digits_between:7,10',
                'email' => 'email',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la institución es requerido',
            'name.string' => 'El nombre de la institución debe ser una cadena de texto',
            'name.between' => 'El nombre debe contener entre 5 y 100 caracteres',

            'phone.required' => 'El número de teléfono es requerido',
            'phone.numeric' => 'El teléfono debe ser de tipo numérico',
            'phone.digits_between' => 'El número de teléfono debe contener entre 7 y 10 caracteres',

            'email.required' => 'El email es requerido',
            'email.email' => 'Digita un email válido',
        ];
    }
}