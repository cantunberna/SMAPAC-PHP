<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequisitionRequest extends FormRequest
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
            'folio' =>'required',
            'coordination_id' => 'required',
            'department_id' => 'required',
            'added_on' => 'required',
            'required_on' =>'required',
            // 'file_req'=> 'mimes:jpeg,bmp,png'
           // 'img_req'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'folio.required' => 'Ingresa un numero de folio.',
            'coordination_id.required' => 'Selecciona una coordinacion.',
            'department_id.required' => 'Selecciona un departamento.',
            'added_on.required' => 'No has ingresado la fecha.',
            'required_on.required' => 'No has ingresado fecha para requerir el material.',
          //  'img_req.required' => 'Selecciona archivo de requisicion.'
        ];
    }


}
