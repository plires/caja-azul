<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\User;

class EditUserRequest extends FormRequest
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
        // $v = Validator::make($data, [
        //     'password' => 'sometimes|min:6|max:16|confirmed|same:password_confirmation'
        // ]);

        return [
            'name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'phone' => 'required|min:0',
            'email' => 'required|email|max:100|unique:users,email,'.$this->route()->id,
            'role' => 'required|in:1,2',
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
            'name.required' => 'Ingresá tu nombre.',
            'name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
            'last_name.required' => 'Ingresá tu apellido.',
            'last_name.max' => 'El campo nombre no puede exceder los 100 caracteres.',
            'phone.required' => 'Ingresá un teléfono.',
            'phone.min' => 'No se admiten valores negativos para el campo teléfono (-11...).',
            'email.required' => 'Ingresá un email.',
            'email.email' => 'Ingrese un email válido.',
            'email.unique' => 'El email ya se encuentra registrado. Cámbielo por otro.',
            'email.max' => 'El campo email no puede exceder los 100 caracteres.',
            'password.required' => 'Ingresá un password.',
            'password.confirmed' => 'Los password no coinciden.',
            'password.same' => 'Los password no coinciden.',
            'password.max' => 'El campo password no puede exceder los 16 caracteres.',
            'password.min' => 'El campo password debe tener al menos 6 caracteres.',
            'role.required' => 'Ingrese el tipo de usuario.',
            'role.in' => 'Ingrese un tipo de usuario válido.'
        ];
    }
}
