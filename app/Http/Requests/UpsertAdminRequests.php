<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpsertAdminRequests extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'Apellidos requeridos',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo no es valido',
            'password.required' => 'Contraseña requerida',
        ];
    }

}
