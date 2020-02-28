<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
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
            'name' => 'required|alpha',
            'code' => 'required|numeric',
            'amount' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.alpha' => 'El campo nombre sólo debe contener letras.',
            'code.required' => 'El campo codigo es obligatorio.',
            'code.numeric' => 'El campo codigo debe ser numérico.',
            'amount.required' => 'El campo cantidad es obligatorio.',
            'amount.numeric' => 'El campo cantidad debe ser numérico.'
        ];
    }
}
