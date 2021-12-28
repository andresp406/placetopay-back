<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'email' => 'required|unique:clients|email',
            'first_name' => 'required|max:30|min:2|alpha',
            'last_name' => 'required|max:30|min:2|alpha',
            'dni' => 'required|unique:clients,dni',
            'type_document' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'El campo :attribute es requerido',
            'first_name.alpha' => 'El campo :attribute solo puede contener letras',

            'last_name.required' => 'El campo :attribute es requerido',
            'last_name.alpha' => 'El campo :attribute solo puede contener letras',

            'dni.required' => 'El campo de :attribute es requerido',
            'dni.unique' => 'La :attribute ya esta registrada',

            'type_document.required' => 'El campo :attribute es requerido',

            'email.required' => 'El campo :attribute es requerido',
            'email.unique' => 'El :attribute ya esta registrado',
            'email.email' => 'El :attribute debe ser valido',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'del nombre',
            'last_name' => 'del apellido',
            'dni' => 'identificacion',
            'type_document' => 'escoja el tipo de documento',
        ];
    }
}
