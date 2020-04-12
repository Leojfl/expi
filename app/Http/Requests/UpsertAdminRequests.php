<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpsertAdminRequests extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route()->parameter("userId", null);


        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                Rule::unique('user', 'email')->ignore($userId),
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'Apellidos requeridos',
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya esta registrado',
            'email.email' => 'El correo no es valido',
            'password.required' => 'Contraseña requerida',
        ];
    }
}
