<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCuponDiscountRequest extends FormRequest
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
            'name' => 'required|max:100',
            'description' => 'required|max:1000',
            'discount' => 'required|numeric|between:1,100',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ingresá el nombre del cupon.',
            'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
            'description.required' => 'Ingresá la descripción del cupon.',
            'description.max' => 'El campo descripción no puede exceder los 1000 caracteres.',
            'discount.required' => 'Ingresá el % de decuento del cupon.',
            'discount.numeric' => 'Para el descuento, ingresa un numero entero.',
            'discount.between' => 'Para el descuento, ingresa un numero entero entre 1-100.',
            'start_date.required' => 'Debe Ingresar una fecha inicial',
            'start_date.before' => 'La fecha inicial no puede ser mayor o igual a la final',
            'start_date.date' => 'Debe Ingresar una fecha inicial valida',
            'end_date.required' => 'Debe Ingresar una fecha final',
            'end_date.date' => 'Debe Ingresar una fecha final valida'
      ];
    }
}
