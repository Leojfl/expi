<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpsertTariffRequests extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required|numeric',
            'time' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El titulo de la tarifa es reequerido',
            'price.required' => 'El precio requerido',
            'price.numeric' => 'El precio debe de ser un numero',
            'time.required' => 'El tiempo maximo es requerido',
            'time.numeric' => 'El tiempo debe
             
             de ser un numero',
        ];
    }


}
