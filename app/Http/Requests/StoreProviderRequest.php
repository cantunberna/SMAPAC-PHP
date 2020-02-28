<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProviderRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'rfc' => 'required|alpha_num',
            'address' => 'required',
            'telephone' => 'required|numeric:/^[\pL\s\-]+$/u'
        ];
    }

    public function messages()
    {
        return [
            'name.alpha' => 'El campo nombre sólo debe contener letras.',
            'rfc.alpha_num' => 'El campo rfc sólo debe contener letras y números.',
            'address.required' => 'El campo dirección es obligatorio.',
            'telephone.required' => 'El campo telefono es obligatorio',
            'telephone.numeric' => 'El campo telefono solo acepta numeros'
        ];
    }
}
