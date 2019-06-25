<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CreateAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street' => 'required|max:190',
            'number' => 'required|max:10',
            'departament' => 'max:10',
            'floor' => 'max:10',
            'locality' => 'required|max:190',
            'cp' => 'required|max:10',
            'state' => 'required|max:190',
            'country' => 'required|max:190',
        ];
    }

    /**
     * 
     *
     * @return array
     */
    public function messages()
    {
        return [
            'street.required' => 'Ingresá la calle.',
            'street.max' => 'El campo calle no puede superar los 190 caracteres.',
            'number.required' => 'Ingresá el número de la calle.',
            'number.max' => 'El campo número de la calle no puede superar los 10 caracteres.',
            'departament.max' => 'El campo departamento no puede superar los 10 caracteres.',
            'floor.max' => 'El campo piso no puede superar los 10 caracteres.',
            'locality.required' => 'Ingresá la localidad.',
            'locality.max' => 'El campo localidad no puede superar los 190 caracteres.',
            'cp.required' => 'Ingresá el codigo postal.',
            'cp.max' => 'El campo codigo postal no puede superar los 10 caracteres.',
            'state.required' => 'Ingresá la provincia.',
            'state.max' => 'El campo provincia no puede superar los 190 caracteres.',
            'country.required' => 'Ingresá el pais.',
            'country.max' => 'El campo pais no puede superar los 190 caracteres.',
        ];
    }
}
