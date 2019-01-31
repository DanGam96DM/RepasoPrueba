<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            'codigoProducto'=>'required|max:50',
            'nombreProducto'=>'required|max:45',
            'stockProducto'=>'required',
            'descripcionProducto'=>'max:200'
        ];
    }
}
