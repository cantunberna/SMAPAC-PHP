<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoordinationRequest extends FormRequest
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
            'slug' => 'required',
            'user_id' => 'required',
            'departments' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ingresa un nombre de la coordinacion.',
            'slug.required' => 'Ingresa un slug',
            'user_id.required' => 'Seleccion un coordinador',
            'departments.required' => 'No se ha seleccionado ningun departamento'
        ];
    }
}
