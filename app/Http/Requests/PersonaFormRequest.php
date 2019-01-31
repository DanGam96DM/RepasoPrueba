<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            'nombrePersona'=>'required|max:45',
            'dpiPersona'=>'required|max:45',
            'direccionPersona'=>'max:45',
            'emailPersona'=>'max:45',
            'telefonoPersona'=>'required|max:45',
            'idTipo'=>'required'
        ];
    }
}
