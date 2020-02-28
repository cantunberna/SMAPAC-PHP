<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoadRequisitionRequest extends FormRequest
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
            'img_req' => 'required|image'
        ];

    }
    public function messages()
    {
        return[
            'img_req.required' => 'Selecciona archivo de requisicion.',
            'img_req.image' => 'El archivo seleccionado no es una imagen'
        ];
    }
}
