<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'markCar'=>'required',
            'modelCar'=> 'required',
            'colorCar'=>'required',
            'numberCar'=>'required|unique:App\Models\Car,numberCar|min:6'
        ];
    }
}
