<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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

    public function rules()
    {
        return [
            'prov_id_one' => 'required',
            'prov_one_img' => 'required|file'
            // 'rfc' => 'required|alpha_num',
            // 'address' => 'required',
            // 'telephone' => 'required|numeric:/^[\pL\s\-]+$/u'
        ];
    }

    public function messages()
    {
        return [
            'prov_id_one.required'=> 'Selecciona un proveedor',
            'prov_one_img.required' => 'Selecciona una archivo de cotización',
            'prov_one_img.file' => 'Archivo no valido'
            // 'rfc.alpha_num' => 'El campo rfc sólo debe contener letras y números.',
            // 'address.required' => 'El campo dirección es obligatorio.',
            // 'telephone.required' => 'El campo telefono es obligatorio',
            // 'telephone.numeric' => 'El campo telefono solo acepta numeros'
        ];
    }
}
