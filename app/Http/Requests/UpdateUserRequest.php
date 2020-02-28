<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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

    /* *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // dd();
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|unique:users,email,'.$this->route('user')
        ];
    }
}
