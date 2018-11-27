<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'category' => 'required|max:100',
            'description' => 'required|max:1000'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Ingresá el nombre del producto.',
      'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
      'category.required' => 'Ingresá una categoría.',
      'category.max' => 'El campo categoría no puede exceder los 100 caracteres.',
      'description.required' => 'Ingresá la descripción del producto.',
      'description.max' => 'El campo descripción no puede exceder los 1000 caracteres.'
        ];
    }
}
