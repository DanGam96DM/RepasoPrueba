<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoFormRequest extends FormRequest
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
            'tipocomprobanteIngreso'=>'required|max:45',
            'seriecomprobanteIngreso'=>'max:45',
            'numcomprobanteIngreso'=>'required|max:45',
            'cantidadIngreso'=>'required',
            'preciocompraIngreso'=>'required',
            'precioventaIngreso'=>'required',
            'idPersona'=>'required',
            'idProducto'=>'required'
        ];
    }
}
