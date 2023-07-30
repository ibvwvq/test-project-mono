<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'fioClient' => 'required|min:3',
            'genderClient' => 'required',
            'phoneClient' => 'required|unique:App\Models\Client,phoneClient|min:12',
            'addressClient' => 'string'
        ];
    }
}
