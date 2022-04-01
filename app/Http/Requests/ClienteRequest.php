<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => ['required', 'min:4'],
            'cpf' => ['required', 'min:4'],
            'nascimento' => ['required'],
            'sexo' => ['required'],
            'telefone' => ['required'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'senha' => ['required', 'string', 'min:8'],
        ];
    }
}
